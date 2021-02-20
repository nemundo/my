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
    'reference' => '389f149bd58b87c1984ce4168ed22c3448e8c3ca',
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
      'reference' => '389f149bd58b87c1984ce4168ed22c3448e8c3ca',
    ),
    'nemundo/content' => 
    array (
      'pretty_version' => '0.11',
      'version' => '0.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7f253d210b51fd8936522a455c0f19eae93023c5',
    ),
    'nemundo/content_app' => 
    array (
      'pretty_version' => '0.13',
      'version' => '0.13.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bd1cb9b4f7bbabf6b185d763b8a6a59f09967dba',
    ),
    'nemundo/core' => 
    array (
      'pretty_version' => '0.45',
      'version' => '0.45.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cc222718a80af22458176137bc25ab95de374610',
    ),
    'nemundo/db' => 
    array (
      'pretty_version' => '0.46',
      'version' => '0.46.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '74725725ee932af2d8ddeca9afe3b0d88fcb97aa',
    ),
    'nemundo/framework' => 
    array (
      'pretty_version' => '0.77',
      'version' => '0.77.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3a17e73c314a220bbda6c1064b506977293f4b94',
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
