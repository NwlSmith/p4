# Project 4
+ By: Nate Smith
+ Production URL: <http://p4.nwlsmith-dwe.me/>

## Feature summary
*Outline a summary of features that your application has. The following details are from a hypothetical project called "Movie Tracker". Note that it is similar to Foobooks, yet it has its own unique features. Delete this example and replace with your own feature summary*

+ Visitors can register/log in
+ Users can add/update/delete movies in their collection (title, release date, director, writer, summary, category)
+ There's a file uploader that's used to upload post images for each movie
+ User's can toggle whether movies in their collection are public or private
+ Each user has a public profile page which presents a short bio about their movie tastes, as well as a list of public movies in their collection. 
+ Each user has their own account page where they can edit their bio, email, password
+ Users can clone movies from another user's public collection into their collection
+ The home page features
  + a stream of recently added public movies
  + a list of categories, with a link to each category that shows a page of movies (with links) within that category

  
## Database summary
*Describe the tables and relationships used in your database. Delete the examples below and replace with your own info.*

+ My application has 3 tables in total (`users`, `movies`, `categories`)
+ There's a many-to-many relationship between `movies` and `categories`
+ There's a one-to-many relationship between `movies` and `users`

## Outside resources
*Your list of outside resources go here*

## Code style divergences
*List any divergences from PSR-1/PSR-2 and course guidelines on code style*

## Notes for instructor
*Any notes for me to refer to while grading; if none, omit this section*



TO DO:
Routes
        need to be able to
        see game and not make moves
        edit/make move if it is your turn
        see past games
    * index - show players and games
    * create game C
    * show game R
    * edit game
    * update game U
    * delete game yes if draw?
CSS for page styling
Child views necessary for each page/feature
Forms on child views necessary to accomplish your CRUD operations/features
Wiring forms to routes/controllers and validating as necessary
Working on the logic code needed to interact with the database (like the examples shown in today's lecture)

Multiplayer tic tac toe etc game

Create - creates new games
Read - displays game and list of games and other users
Update - update boards
Delete - not present? delete games that go to a draw?

tables:
Accounts
    id username/email password, pic_url,(multiple themes that can be changed and kept track of), num_games, wins, losses, list of game IDs
Games
    id created_time last_move_time last_move_time player1id (x) player2id (o) active(bool) whose_turn a1 a2 a3 b1 b2 b3 c1 c2 c3


create account - choose light or dark theme

List of accounts (with button to start a game) + list of current games + list of finished games

Game:

menu at top to go to list or change light and dark theme.(?)

     1 2 3
   a x o x
   b o x x
   c x o 0
   
   Each empty space is a button, click on it and then click make move