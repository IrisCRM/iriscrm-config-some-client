<?php

namespace SomeClient\Config\ConfigName\sections\Account;

use Iris\Config\CRM\sections\Account\s_Account as s_AccountBase;

/**
 * Серверная логика карточки компании
 */
class s_Account extends s_AccountBase
{
    function onPrepare($params)
    {
        // Заполняем значения по умолчанию только при создании новой записи
        if ($params['mode'] != 'insert') {
            return null;
        }

        $con = $this->connection;

        $result = null;

        // Значения справочников
        $this->getValuesFromTables($result, array(
            '{AccountType}' => 'Client',
            '{AccountFace}' => 'Legal',
            //'{AccountState}' => 'C',
            '{Category}' => 'B',
        ));

        // Ответственный
        $UserName = GetUserName();
        $result = GetDefaultOwner($UserName, $con, $result);

        // Получим страну, город и область из компании пользователя
        $UserID = GetArrayValueByParameter($result['FieldValues'], 'Name', 'OwnerID', 'Value');
        $AccountID = GetFieldValueByID('Contact', $UserID, 'AccountID', $con);
        $result = GetLinkedValues('Account', $AccountID, array('Country', 'City', 'Region'), $con, $result);

        // Дата
        $Date = GetCurrentDBDate($con);
        $result = FieldValueFormat('FirstContactDate', $Date, null, $result);

        return $result;
    }

    public function onBeforePostRegionID($parameters)
    {
        $value = $this->getActualValue($parameters['old_data'], 
                $parameters['new_data'], 'RegionID');
        if (!$value) {
            return null;
        }
        return GetLinkedValues('Region', $value, array('Country'), 
                $this->connection);
    }

    public function onBeforePostCityID($parameters)
    {
        $value = $this->getActualValue($parameters['old_data'], 
                $parameters['new_data'], 'CityID');
        if (!$value) {
            return null;
        }
        return GetLinkedValues('City', $value, array('Country', 'Region'), 
                $this->connection);
    }
}
