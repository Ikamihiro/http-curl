<?php

namespace Http;

class HttpClient
{
    public function request(string $method, string $url, mixed $body, $headers = []): HttpResponse
    {
        $newRequest = new HttpRequest($method, $url, $headers, $body);

        return $newRequest->send();
    }

    public function get(string $url, mixed $body, $headers = []): HttpResponse
    {
        return $this->request('GET', $url, $body, $headers);
    }

    public function post(string $url, mixed $body, $headers = []): HttpResponse
    {
        return $this->request('POST', $url, $body, $headers);
    }

    public function put(string $url, mixed $body, $headers = []): HttpResponse
    {
        return $this->request('PUT', $url, $body, $headers);
    }

    public function delete(string $url, mixed $body, $headers = []): HttpResponse
    {
        return $this->request('DELETE', $url, $body, $headers);
    }
}
