<?php

namespace Http;

class HttpRequest
{
    protected string $method;
    protected string $url;
    protected array $headers;
    protected mixed $body;

    public function __construct(string $method, string $url, array $headers, mixed $body)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): mixed
    {
        return $this->body;
    }

    public function send(): HttpResponse
    {
        $response = new HttpResponse;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->getUrl());
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->getMethod());

        if ($this->getBody()) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getBody());
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($curl);
        $info = curl_getinfo($curl);

        curl_close($curl);

        if (str_contains('application/json', $info['content-type'])) {
            $data = json_decode($data, true);
        }

        $response->setStatusCode($info['http_code']);
        $response->setBody($data);
        $response->setHeaders($info);

        return $response;
    }
}
