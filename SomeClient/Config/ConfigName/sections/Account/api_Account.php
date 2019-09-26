<?php
namespace SomeClient\Config\ConfigName\sections\Account;

use Config;
use Iris\Annotation\RequestMethod;
use Iris\Annotation\RequireAuth;
use PDO;

// http://iriscrm.domain/api/Account/getAccountList?api-token=<TOKEN>
class api_Account extends Config
{
    /**
     * @RequestMethod({"get", "post"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function getAccountList($request) {
        $con = $this->connection;
        $sql = 'select name from iris_account limit 10';
        $res = $con->query($sql)->fetchAll(PDO::FETCH_NUM);
        return $res;
    }
}
