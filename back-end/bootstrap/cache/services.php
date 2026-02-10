<?php return array (
  'providers' => 
  array (
    0 => 'Laravel\\Sail\\SailServiceProvider',
    1 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    2 => 'Laravel\\Tinker\\TinkerServiceProvider',
    3 => 'Carbon\\Laravel\\ServiceProvider',
    4 => 'Termwind\\Laravel\\TermwindServiceProvider',
    5 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    1 => 'Carbon\\Laravel\\ServiceProvider',
    2 => 'Termwind\\Laravel\\TermwindServiceProvider',
    3 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
  ),
  'deferred' => 
  array (
    'Laravel\\Sail\\Console\\InstallCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'Laravel\\Sail\\Console\\PublishCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'command.tinker' => 'Laravel\\Tinker\\TinkerServiceProvider',
  ),
  'when' => 
  array (
    'Laravel\\Sail\\SailServiceProvider' => 
    array (
    ),
    'Laravel\\Tinker\\TinkerServiceProvider' => 
    array (
    ),
  ),
);