<?php

namespace Http;

class HttpResponse
{
    protected array $headers;
    protected int $statusCode;
    protected mixed $body;

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function getBody(): mixed
    {
        return $this->body;
    }

    public function setBody(mixed $body): void
    {
        $this->body = $body;
    }
}
