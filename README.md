# [Book Reviewing System]
Framgia has many technical books that all employees can read. To manage and use them effectively, the management and reviewing system is needed.

## User
- can register for app
- can signin, signout
- can see the list of all books
- can search books by title, category, rating, favorite, etc.
- can rate and write a review for book (also can edit, delete it)
- can comment to a review (also can edit, delete it)
- can mark a book as reading
- can mark a book as read
- can mark a book as his/her favorite book
- can see reading history
- can follow/unfollow other users
- can see other user's favorite book list
- can see the activities on the timeline on home page
- can send admin a request to buy a new book (also can cancel it)
- can see the list of the requests he/she sent
- can like/unlike to an activity

## Admin
- account is made by rake task
- cannot register on browser
- can signin, signout
- can manage (CRUD) books
- can manage users
- can manage the requests to buy a new book sent from users

## Book
- must belong to a category
- must have informations at least: title, publish date, author, the number of pages, category

## Activities
- follow/followed
- mark as read
- mark as favorite
- write review
- write comment

# [System]
- Send verify email when users signup success.

# Step by step
1. Design database
2. Add tasks on redmine + estimate time
3. Init project
4. Init models, add relationship
5. Design static pages
6. Signup / Login / Logout
7. Other pulls

# Step to update task on redmine
1. Change Status to "In Progress", "Due date"
2. Update  "Spent time", "% Done (100)",  before send pull request to trainer 
3. If trainer COMMENT, change "% Done (80)", after that continue to fix comment; if not, move to step 4
4. After MERGED, update task infomation "spent time", "% Done (100)", Status to "Resolved" 

# Notice: 
Trừ pull init project và init model, các pull khác không quá 15 files thay đổi
Các bạn trong team review chéo cho nhau + comment OK vào pull sau khi review xong mà không có lỗi nào

# [Framgia Coding Standard PHP]
https://github.com/framgia/coding-standards/tree/master/vn/php

# PHP-Code-Sniffer check code convention with Sublime Text 
1. https://gist.github.com/tuanpht/98da682333dd1bc8e4516417653158aa 
2. https://github.com/wataridori/framgia-php-codesniffer
