<?php

namespace SomeClient\Config\ConfigName\sections\Demo;

use Config;
use Iris\Annotation\RequestMethod;
use Iris\Annotation\RequireAuth;

class page_Demo extends Config
{
    /**
     * @RequestMethod({"get"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return string
     */
    public function testMethodWithAuth($request) {
        return '<html>My HTML page</html>';
    }

    /**
     * @RequireAuth(false)
     * @RequestMethod({"get"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return string
     */
    public function testMethodWithoutAuth($request) {
        return $this->renderView('demo', [
            'data' => $request->query->all(),
        ]);
    }
}
