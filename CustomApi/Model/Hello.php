<?php

namespace Training\CustomApi\Model;
use Training\CustomApi\Api\HelloInterface;

class Hello implements HelloInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function name($name) {
        $response = ['success' => false];
        try {
            // Your Code here
            $response = ['success' => true, 'message' => $name];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray;
        // return "Hello, " . $name;
    }
}
