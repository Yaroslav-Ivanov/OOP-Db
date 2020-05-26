<?php

namespace Controller;

class AbstractController
{
    protected  function redirect(string $location)
    {
        Header("Location: ?$location");
    }
}