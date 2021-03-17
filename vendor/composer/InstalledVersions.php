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
    'reference' => '779474d751dbad929447decd5fcec4d7efb03a6f',
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
      'reference' => '779474d751dbad929447decd5fcec4d7efb03a6f',
    ),
    'nemundo/content' => 
    array (
      'pretty_version' => '0.21',
      'version' => '0.21.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dcdd98d2c254dfce0e440d7868a2405730b85e68',
    ),
    'nemundo/content_app' => 
    array (
      'pretty_version' => '0.23',
      'version' => '0.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e8eab607861877420a1d6bcbbfa27b227a566aeb',
    ),
    'nemundo/core' => 
    array (
      'pretty_version' => '0.48',
      'version' => '0.48.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a633a6834fdee0e960c4f4dc2db9ebf561a6c7df',
    ),
    'nemundo/db' => 
    array (
      'pretty_version' => '0.50',
      'version' => '0.50.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc05a62c2e2e04e410b38bbb4e0beef1f733b699',
    ),
    'nemundo/framework' => 
    array (
      'pretty_version' => '0.91',
      'version' => '0.91.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '07b6e19e8d4d7906f01e4fb06e19c56ffd3199e5',
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
