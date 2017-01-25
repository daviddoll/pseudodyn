pseudodyn -  a primitive alternative to third-party dynamic DNS services

Q: Whats the idea behind all of this?

A: You may need to keep track of several (internet or lan) hosts with changing ip addresses and you do not want to use a third party dynamic dns service


Q: What do I need to get it running?

A: A webserver with PHP support (server-side) and an application to call an URL periodically (curl via cron for example)


Q: How does it work?

A: Define accepted user names in the index.php file (see $alloweduser array) and upload it to your webserver. After that create a folder with name "datafolder" next to the index.php. Make sure the webserver has write permissions on it. Then call http://thisismydomain.com/index.php?user=xyz from your client


Q: How can I see the users ip addresses?

A: Call the URL http://thisismydomain.com/index.php?user=chief to get a list of all your users, their last know ip address and the time of the last update. If you want to keep that information private you may change "chief" to something else.


Q: What can go wrong?

A: Not sure but since an external call makes your webserver write data on its own harddisk you may think about a quota for the "datafolder". Also since there is no authentification (yet) an unauthorized person may also keep track of your hosts.


Q: What about security?

A: You should concider the use of https instead of http. Https encrypts the URL via TLS (the "/index.php?user=username" part to be precise).


Q: What's up next?

A: Here are some ideas with (maybe) more to come:
---> use a fixed (but generated) passwort for updates instead of cleartext username
---> authentification for user updates
---> authentification for "admin" login
---> webform to create and delete user
---> ...
