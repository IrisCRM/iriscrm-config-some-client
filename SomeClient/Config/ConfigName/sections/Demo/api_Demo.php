<?php

namespace SomeClient\Config\ConfigName\sections\Demo;

use Config;
use Iris\Annotation\RequestMethod;
use Iris\Annotation\RequireAuth;

class api_Demo extends Config
{
    /**
     * @RequestMethod({"get", "post"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function testMethodWithAuth($request) {
        return [
            'param-value' => $request->get('param_test'),
            'content' => $request->getContent(),
            'token_header' => $request->headers->get('api_token'),
            'token_param' => $request->get('api_token'),
        ];
    }

    /**
     * @RequireAuth(false)
     * @RequestMethod({"get", "post"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function testMethodWithoutAuth($request) {
        return [
            'param-value' => $request->get('param_test'),
            'content' => $request->getContent(),
            'token_header' => $request->headers->get('api_token'),
            'token_param' => $request->get('api_token'),
        ];
    }
}
