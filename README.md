# Blog website with Laravel framework

## At the Site part
- you can see a slider of blogs 
- Search input to search of blogs content (ajax and api)
- Latest 4 blogs of each category
- List of all categories so you can move to each one and see all category's blogs
- for each blog there is image, title, author name and image, created date and count of likes
- You can see blog's details and make like reaction and see the number of likes for that blog
- At the footer there is the latest and popular blogs
- At the nav there is register and login links for guest and Go to Dashboard link for logged user
- Only logged user can react on blogs and guests can only see the number of likes

## At the Dashboard part
after register and login
there is a roles system by laratrust package
there is only one owner with name: admin, email: admin@admin.com, password: admin
and all other registerd users take author role

#### The owner
- See the statistic
- Add blogs and control other user's blogs
- Control author users
- Add categories
#### The Author
- Add blogs and control his own blogs only
- Add categories

## Packages used at this project 
- ** Laratrust for permissions and roles
- ** Livewire for users to make like reaction on blogs

## JS and CSS Libraries
- Filepond -> upload images
- datatables -> for tables with search and pagination 
- swipper -> for add slider
- tom-select -> for select input
- jquery -> for using ajax for real time search proccess
- bootstrap -> to style the site

### to install it 
- clone the repo
- cd to the project folder
- php artisan migrate
- php artisan db:seed
- php artisan db:seed --class=RoleSeed
- php artisan storage:link
- php artisan serv

