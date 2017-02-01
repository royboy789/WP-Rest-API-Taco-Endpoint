# WordPress REST API Taco Endpoing #
Whats the point?  
To give you tacos!  

┈┈┈┈╭╯╭╯╭╯┈┈┈┈┈  
┈┈┈╱▔▔▔▔▔╲▔╲┈┈┈  
┈┈╱┈╭╮┈╭╮┈╲╮╲┈┈  
┈┈▏┈▂▂▂▂▂┈▕╮▕┈┈  
┈┈▏┈╲▂▂▂╱┈▕╮▕┈┈  
┈┈╲▂▂▂▂▂▂▂▂╲╱┈┈  

## The Response ##
![taco response](https://github.com/royboy789/WP-Rest-API-Taco-Endpoint/blob/master/taco_response.png?raw=true "Taco WP REST API RESPONSE")

## To add a taco! ##
Use the __taco_api_tacos__ filter  
```
add_filter( 'taco_api_tacos', 'add_tacos', 10, 1 );  
function add_tacos( $tacos ) { $tacos[] = "your taco" }
```
