# WordPress REST API Taco Endpoint #
Whats the point?  
To give you tacos!  

┈┈┈┈╭╯╭╯╭╯┈┈┈┈┈  
┈┈┈╱▔▔▔▔▔╲▔╲┈┈┈  
┈┈╱┈╭╮┈╭╮┈╲╮╲┈┈  
┈┈▏┈▂▂▂▂▂┈▕╮▕┈┈  
┈┈▏┈╲▂▂▂╱┈▕╮▕┈┈  
┈┈╲▂▂▂▂▂▂▂▂╲╱┈┈  

## To add a taco! ##
Use the __taco_api_tacos__ filter  
```
add_filter( 'taco_api_tacos', 'add_tacos', 10, 1 );  
function add_tacos( $tacos ) { $tacos[] = "your taco" }
```
## Tacos in Posts ##
If you pass `tacos=true` to a `/post/ID` endpoint, you will get a taco response as part of your __post object__

## The Response ##
![taco response](https://github.com/royboy789/WP-Rest-API-Taco-Endpoint/blob/master/taco_response.png?raw=true "Taco WP REST API RESPONSE")  
Post Response:  
![taco response](https://github.com/royboy789/WP-Rest-API-Taco-Endpoint/blob/master/taco_post_object.png?raw=true "Taco WP REST API POST RESPONSE")
