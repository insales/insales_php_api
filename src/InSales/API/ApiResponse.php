<?php

namespace InSales\API;

/**
 * Class ApiResponse
 * Ответ,пришедший от ApiClient
 *
 * @package InSales
 *
 */
class ApiResponse {

    /** @var  int $httpCode Код ответа */
    protected $httpCode;

    /**
     * @var array $headers Заголовки
     */
    protected $headers;

    /** @var  array */
    private $response;

    public function __construct($httpCode, $data = [], $message = null, $headers = []) {
        $this->httpCode = $httpCode;
        $this->headers = $headers;
        $this->response = [
            'data' => $data,
            'message' => $message
        ];
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->response['message'];
    }

    public function isSuccessful()
    {
        return in_array(
            $this->httpCode,
            [201, 200]
        );
     }
    /**
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->response['message'] = $message;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function getData()
    {
        return $this->response['data'];
    }

    public function setData($data)
    {
        $this->response['data'] = $data;
    }

    /**
     * @param int $httpCode
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
    }
}
