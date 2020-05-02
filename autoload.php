<?php

function autoLoadCore($aCoreName)
{
	$aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . strtolower($aCoreName) . '.php';
    if (file_exists($aClassFilePath)) {
        require_once $aClassFilePath;
        return true;
    }
    return false;
}

function autoLoadClass($aClassName)
{
	$aClassFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . strtolower($aClassName) . '.php';
    if (file_exists($aClassFilePath)) {
        require_once $aClassFilePath;
        return true;
    }
    return false;
}

function autoLoadModel($aModelName)
{
	$aModelFilePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . strtolower($aModelName) . '.php';
    if (file_exists($aModelFilePath)) {
        require_once $aModelFilePath;
        return true;
    }
    return false;


}