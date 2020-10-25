# Coffee PHP

## About Coffee PHP
Coffee PHP is a <b>(`small` && `fast` && `easy` && `modular`)</b> PHP Framework. <br />
Brewed for code reusability accross multiple project.


## Core Concept
Coffee PHP is made for modular. which means you can create modular app with Coffee PHP and reuse code for other project easily . 

### App Template Directory structure : 
```
- vendor 
  - (composer packages)

- public
  - index.php <-- entrypoint for public access 

- app <-- your main app
  - MyModule <-- your module can be transfered / copied to another project
    - Controller.php
    - Model.php
    - View.php
    - .env <-- your config file

- cli <-- your cli script 
  - Command1.php
  
- brew <-- for running command php brew [commands]

```

<b>This Project is under development</b>
