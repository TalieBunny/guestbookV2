Technical assignment requires to create a guestbook using the Laravel framework and a database of choice. The requirements are open-ended.

The guestbook allows for the following:
1. Register of a user
2. Login of a user
3. User levels (admin)
4. CRUD operations by a registered user on their own messages 
5. Replying to messages sent by user (admin)
6. Deleting any user's messages (admin)
7. Unit tests are not required but would be an advantage.


The assignment is done using Docker setup. 

After initial application setup and database migration run **php artisan db:seed** to seed the database with users and their messages. 
Run **php artisan users:create_admin** to create admin user, password will not be visible while typing make sure to remember the password.

Application includes two unit RegisterUserTest.php and CreateNewMessageTest.php tests located in test\Unit directory.

The visual aspect of this task (HTML) will not be highly evaluated, however please have a look at the app rendered in the browser, I think it looks really nice.
