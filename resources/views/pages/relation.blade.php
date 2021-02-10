@extends('layouts.default')
@section('pagetitle', 'Relation')
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

<a href="https://medium.com/@afrazahmad090/laravel-many-to-many-relationship-explained-822b554c1973" target="_blank">https://medium.com/@afrazahmad090/laravel-many-to-many-relationship-explained-822b554c1973</a>
<h4>post:</h4>
<pre><code lang="json">
{
  "name":"test",
  "email":"asd@asd.at"
}</code>
</pre>

@stop