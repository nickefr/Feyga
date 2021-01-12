<?php
 
ini_set('display_errors','on' );

require_once "lib/dbconnect2.php";
require_once "lib/board.php";
require_once "lib/game.php";
require_once "lib/users.php";

//me to pou kaname GET ,pigame sto request,i method pire thn timh get,to request pire ena stoixeio
//to board kai mpainoume sto switch array_shift kai tupwnoume board 

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
//ousiastika epeidi xrisimopoioume put methodo - to input diabazei username k p_color (i kapoia alli idiotita pou tha orisw)
//an dn iksera oti eiani json tha eprepe na kanw ena if pio panw gia na dw an einai px html ktlp alla tr kserw oti einai json

if(isset($_SERVER['HTTP_X_TOKEN'])) {
	$input['token']=$_SERVER['HTTP_X_TOKEN'];
}

switch ($r=array_shift($request)) {
    case 'board' : 
            switch ($b=array_shift($request)) {
                case '':
                case null: handle_board($method,$input); 
                            break;
                case 'piece': handle_piece($method, $request[0],$request[1],$input);
                            break;
							
                default: header("HTTP/1.1 404 Not Found");
                            break;
			}
			break;
    case 'status': 
			if(sizeof($request)==0) {show_status();}
			else {header("HTTP/1.1 404 Not Found");}
			break;
	case 'players': handle_player($method, $request,$input);
            break;
    default:  header("HTTP/1.1 404 Not Found");
                        exit;
}

function handle_board($method,$input) {
 
        if($method=='GET') {
			//tha diabasei to board
                show_board($input);
        } else if ($method=='POST') {
			//tha mou kanei reset to board
                reset_board();
				show_board($input);
        }
		
}

function handle_piece($method, $x,$y,$input) {
	if($method=='GET') {
        show_piece($x,$y);
    } else if ($method=='PUT') {
		move_piece($x,$y,$input['x'],$input['y'],$input['token']);
    }    
}
 
function handle_player($method, $request,$input) {
	switch ($b=array_shift($request)) {
		case '':
		case null: if($method=='GET') {show_users($method);}
				   else {header("HTTP/1.1 400 Bad Request"); 
						 print json_encode(['errormesg'=>"Method $method not allowed here."]);}
                    break;
        case 'B': 
		case 'R': handle_user($method, $b,$input);
					break;		
		default: header("HTTP/1.1 404 Not Found");
				 print json_encode(['errormesg'=>"Player $b not found."]);
                 break;
	}
}
 
?>