Shin - Library
=========
Shin is dynamic library that makes it easier to combine multiple tables that have a relationship between a foreign key and a primary key with several lines of code.

Server Requirement
------------------
PHP 7.x

Installation
------------------

Load the library
~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

	// load the library first
	$this->load->library('Shin');
	
Load the Model
~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

	// load the library first
	$this->load->model('Global_model');
	// use aliases better
	$this->load->model('Global_model','gm');
	
Usage
~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

	// this code will find columns of the table
	$column = $this->shin->findColumnAndTable('table_name');
	// Call the query, and the table will join by itself without having to mention the relation table 
	$this->gm->leftJoinTable('table_name', $column)->result();

	
Note
~~~~~~~~~~~~~~~~~~~~~
table columns must begin with "id_", the foreign key column and the primary key column must be the same. For more details, please see the example.
