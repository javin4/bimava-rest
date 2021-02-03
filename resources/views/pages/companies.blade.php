@extends('layouts.default')
@section('pagetitle', 'Companies')
@section('content')                    
<pre>
+--------+-----------+------------------------------+-------------------+------------------------------------------------+------------+
| Domain | Method    | URI                          | Name              | Action                                         | Middleware |
+--------+-----------+------------------------------+-------------------+------------------------------------------------+------------+
|        | GET|HEAD  | api/companies                | companies.index   | App\Http\Controllers\CompanyController@index   | api        |
|        | POST      | api/companies                | companies.store   | App\Http\Controllers\CompanyController@store   | api        |
|        | GET|HEAD  | api/companies/{company}      | companies.show    | App\Http\Controllers\CompanyController@show    | api        |
|        | PUT|PATCH | api/companies/{company}      | companies.update  | App\Http\Controllers\CompanyController@update  | api        |
|        | DELETE    | api/companies/{company}      | companies.destroy | App\Http\Controllers\CompanyController@destroy | api        |
+--------+-----------+------------------------------+-------------------+------------------------------------------------+------------+
        </pre>

<a href="https://dev.to/seankerwin/laravel-8-rest-api-with-resource-controllers-5bok" target="_blank">https://dev.to/seankerwin/laravel-8-rest-api-with-resource-controllers-5bok</a>
<h4>post:</h4>
<pre><code lang="json">
{
  "name":"test",
  "email":"asd@asd.at"
}</code>
</pre>

@stop