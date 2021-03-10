<?php


interface Logger
{
    public function log(string $buttonId, string $ip): array;
}