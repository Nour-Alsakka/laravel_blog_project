# Blog website with Laravel framework

## Overview

This is a blog website built with the Laravel framework, featuring a user-friendly interface for both site visitors and administrators. The website allows users to register, log in, and interact with blog posts, while administrators can manage blogs, categories, and users.

## Site Features

### Homepage of the site

- Slider showcasing blog we decided to show
- Latest 4 blogs from each category
- List of all categories with links to view all blogs in each category
- Blog previews with image, title, author name and image, created date, and like count

### Blog Details

- View blog details
- Make like reactions (for logged-in users only)
- Display like count for each blog

### Navigation

- Register and login links for guests
- Go to Dashboard link for logged-in users
- Search input for searching blog content (using AJAX and API)

### Footer

- Latest blogs
- Popular blogs

## Dashboard Features

### Roles System

Implemented using Laratrust package

- One owner role (admin@admin.com, password: admin) with elevated permissions
- All other registered users are assigned the author role

### Owner (Admin) Features

- View website statistics
- Add blogs and manage other user's blogs
- Control author users
- Add categories

### Author Features

- Add and manage own blogs
- Add categories

## Technical Details

### Packages used at this project

- Laratrust for permissions and roles
- Livewire for real-time like reactions

### JS and CSS Libraries

- Filepond for image uploads
- Datatables for tables with search and pagination
- Swipper for slider functionality
- Tom-select for select inputs
- jQuery for AJAX for search functionality
- Bootstrap for styling

## Installation

1. Clone the repository
2. Change directory to project folder (cd project-folder)
3. Run `php artisan migrate` to set up the database
4. Run php `artisan db:seed` to seed the database with initial data
5. Run php `artisan db:seed --class=RoleSeed` to seed roles
6. Run `php artisan storage:link` to set up storage links for images
7. Run `php artisan serv` to start the development server

## Getting Started

1. Register as a user or log in as the admin (admin@admin.com, password: admin)
2. Explore the site and dashboard features
3. Start creating and managing blogs, categories, and user roles!
