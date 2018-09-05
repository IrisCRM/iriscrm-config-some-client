Данный репозиторий содержит примеры настройки конфигурации путем переопределения элементов стандартной конфигурации.

# Установка

Для использования данного репозитория необходимо установить [проекте-шаблон](https://github.com/IrisCRM/iriscrm-project) согласно [инструкции по установке](https://github.com/IrisCRM/iriscrm-project/blob/master/docs/guides/ru/installation.md). Затем внести следующие изменения:
1. В composer.json подключить репозиторий, прописав зависимость `iriscrm/config-some-client` в секции `require` и репозиторий в секции `repositories`:
    ```json
    {
        "name": "iriscrm/iriscrm-project",
        "description": "Iris CRM",
        "require": {
            "bernard/bernard": "^1.0@alpha",
            "iriscrm/core": "^5.5.3",
            "iriscrm/config-crm": "^5.5.2",
            "iriscrm/config-some-client": "master@dev"
        },
        "repositories": [
          {
            "type": "git",
            "url": "https://github.com/IrisCRM/iriscrm-config-some-client.git"
          }
        ],
        "autoload": {
            "psr-4": {
                "": "src/"
            }
        }
    }
    ```
1. Добавить файл src/hierarchy.php:
    ```php
    <?php
    return [
        [
            'namespace' => '\\SomeClient\\Config\\ConfigName',
            'directory' => 'vendor/iriscrm/config-some-client/SomeClient/Config/ConfigName/',
            'postfix' => '_custom',
        ],
        [
            'namespace' => '\\Iris\\Config\\CRM',
            'directory' => 'vendor/iriscrm/config-crm/',
            'postfix' => '',
        ],
    ];
    ```
1. Выполнить сборку проекта:
    ```bash
    npm run build:prod
    ```
