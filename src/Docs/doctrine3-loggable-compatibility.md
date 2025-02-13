#Loggable

The Gedmo doctrine extension loggable functionality is broken when upgrading to doctrine >3.

This is because of the data element in the external_log entity using the array type that has been deprecated in
doctrine 3.

As a workaround this bundle has an ArrayType that extends the JsonType. Beware, this is a hack as the array type can 
only hold a single level of key values. The json type can also nest objects and arrays. So the provided ArrayType is 
intended to be used only with the loggable functionality from the doctrine extensions.

Alternatively, since the class to log the entries can be configured, it is possible to extend the entity and configure 
the home brew entity with the adjusted data type to be used.

