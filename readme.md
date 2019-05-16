# Project 4
+ By: Nate Smith
+ Production URL: <http://p4.nwlsmith-dwe.me/>

## Feature summary

+ Visitors can register/log in
+ The home page features
  + On the left, a list of players who they can challenge to a game of tic tac toe
  + The central panel contains a list of current games
  + All past games are listed to the right
+ A challenger can send a request to another player and the other player goes first
+ Both wins and losses are kept track of for each player

  
## Database summary

+ My application has 2 tables in total (`users`, `games`)
+ There's a many-to-many relationship between `users` and `games`
    
## Notes

+ So you can more easily see the features of this application without creating several accounts, the emails of the other players are:
  + a@a.com
  + b@b.com
  + c@c.com
+ Each password is 'helloworld'