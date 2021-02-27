<?php











namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => '2281280704c65c60047d6e922024ec13b268a91b',
    'name' => '__root__',
  ),
  'versions' => 
  array (
    '__root__' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '2281280704c65c60047d6e922024ec13b268a91b',
    ),
    'nemundo/content' => 
    array (
      'pretty_version' => '0.14',
      'version' => '0.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f90027c579e2c4405d7242e9dcd7edaaa924cf2b',
    ),
    'nemundo/content_app' => 
    array (
      'pretty_version' => '0.16',
      'version' => '0.16.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '219e135a0269a125821f6b43fd57cb278811853e',
    ),
    'nemundo/core' => 
    array (
      'pretty_version' => '0.46',
      'version' => '0.46.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '846b2e1b46232d1000af7c62fc82771bf2adb31f',
    ),
    'nemundo/db' => 
    array (
      'pretty_version' => '0.48',
      'version' => '0.48.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8bd23c32d47836b69674a96154e18c59ac5383d3',
    ),
    'nemundo/framework' => 
    array (
      'pretty_version' => '0.81',
      'version' => '0.81.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '128d745a05407f345ab9597591b706ea8b6eaa16',
    ),
    'nemundo/html' => 
    array (
      'pretty_version' => '0.49',
      'version' => '0.49.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3657e779da0d13948d42e5b8f4f252607700c266',
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
