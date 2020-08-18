<p align="center"><img src="Documentation/home.png"width=85%>
</p>

Company management dashboard built with PHP, Vue.js and Postgres. Capable of creating new companies, listing all companies, uploading files, listing all files, and importing company data from a csv file. 

## usage

## features
<p align="center"><img src="Documentation/ex1.gif"width=70%>
</p>
User can upload a file and see it listed on the files page. 

<p align="center"><img src="Documentation/ex3.gif"width=70%>
</p>
User can upload a CSV file and use that information to fill in the companies. 

### scalability
There were a few key design choices made in order to ensure scalability: 
- The company and files tables include a userId input attribute in order to ensure that once a log in authentication is implemented the companies and files can be listed by user. 
- The many to many relationship between companies and tags is represented using a pivot table that stores the company id and tag id. This ensures that the database schema is normalised, and that in the future the user would be able to search for a company by tag. 
- The files are stored locally in the /storage folder, once the dashboard is deployed in production this would be easy to switch to using AWS to store the documents, see the [Laravel Docs](https://laravel.com/docs/7.x/filesystem#driver-prerequisites). 

### user validation 
<p align="center"><img src="Documentation/ex2.gif"width=70%>
</p>
Validates correct user input prior to inserting it in to the database. 

## built with 
[laravel](https://github.com/laravel) | [vue.js](https://github.com/vuejs) | [postgres](https://github.com/postgres)
