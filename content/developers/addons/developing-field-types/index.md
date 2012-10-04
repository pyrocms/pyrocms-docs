# Developing Field Types

PyroStreams is designed specifically to be extended so that its functionality can go far beyond that which comes with the PyroStreams core. The primary way to extend PyroStream is to create new <strong>field types</strong>. Field types allow you to manage types of data and the input, output, and storage of each. They can range in complexity to a few lines of code to as many as you need to get the job done.

A simple example is the {{ link title="email field type" uri="field-types/email" }}. It allows us to specify a few important things:

* What type of column we should create in the database to hold the data (in this case, a VARCHAR)
* What sort of form input we need to input the data (a simple text field)
* Any extra data validation (in this case, we need to make sure the input is a valid email address)

Although this is a very simple example, PyroStreams has the ability for you to plug into all sorts of existing structures to build complex or simple field types and extend PyroStreams' functionality.

{{ nav:auto start="developers/addons/developing-field-types" }}