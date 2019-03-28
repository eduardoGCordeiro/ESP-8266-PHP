<?php
/**
 * Created by PhpStorm.
 * User: eduar
 * Date: 24/03/2019
 * Time: 21:49
 */

$port = 'COM3';
$config;
$arquivo = fopen ('stepSize.txt', 'r');
$config[0] = fgets($arquivo);
fclose($arquivo);
$arquivo2 = fopen ('stepSizeAngle.txt', 'r');
$config[1] = fgets($arquivo2);
fclose($arquivo2);

function configureSpeed($speed)
{
    global $port;
    $cmd = 'powershell.exe $port= new-Object System.IO.Ports.SerialPort '.$port.',9600,None,8,one; $port.open(); $port.WriteLine(\'v'. $speed.'\'); $port.Close()';
    exec($cmd);
}

function positive()
{
    global $config, $port;
    $cmd = 'powershell.exe $port= new-Object System.IO.Ports.SerialPort '.$port.',9600,None,8,one; $port.open(); $port.WriteLine(\'x'.$config[0].'\'); $port.Close()';
    exec($cmd);
}

function negative()
{
    global $config, $port;
    $cmd = 'powershell.exe $port= new-Object System.IO.Ports.SerialPort '.$port.',9600,None,8,one; $port.open(); $port.WriteLine(\'x-'.$config[0].'\'); $port.Close()';
    exec($cmd);
}

function moveOrigin()
{
    global $port;
    $cmd = 'powershell.exe $port= new-Object System.IO.Ports.SerialPort '.$port.',9600,None,8,one; $port.open(); $port.WriteLine(\'h\'); $port.Close()';
    exec($cmd);
}

function angle()
{
    global $config, $port;
    $cmd = 'powershell.exe $port= new-Object System.IO.Ports.SerialPort '.$port.',9600,None,8,one; $port.open(); $port.WriteLine(\'a'.$config[1].'\'); $port.Close()';
    exec($cmd);
}

    if(isset($_GET['config']))
    {
        switch (explode('.', $_GET['config'])[0])
        {
            case 'p':
                global $config;
                $arquivo = fopen('stepSize.txt', 'w');
                $stepSize = explode('.', $_GET['config'])[1];
                fwrite($arquivo, $stepSize);
                fclose($arquivo);
                break;

            case 'a':
                global $config;
                $arquivo = fopen('stepSizeAngle.txt', 'w');
                $stepSizeAngle = explode('.', $_GET['config'])[1];
                fwrite($arquivo, $stepSizeAngle);
                fclose($arquivo);
                break;

            case 's':
                configureSpeed(explode('.', $_GET['config'])[1]);
                break;

        }

    }  else
    {
        switch ($_GET['move'])
        {
            case 'positive':
                positive();
                break;

            case 'negative':
                negative();
                break;

            case 'reset':
                moveOrigin();
                break;

            case 'angle':
                angle();
                break;
        }
    }

?>