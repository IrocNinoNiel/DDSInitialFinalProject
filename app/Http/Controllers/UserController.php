<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Student;
    use  App\Models\User;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;

    Class UserController extends Controller {   
        use ApiResponser;
        private $request;

        public function __construct(Request $request){
            $this->request = $request;
        }

        public function verifyUser(Request $request){
            $user_name = $request->user_name;
            $user_pass = $request->user_pass;
            $isFound = false;

            $users = User::all();

            foreach($users as $user) {
                if($user->user_name == $user_name && $user->user_pass == $user_pass){
                    $isFound = true;
                    break;
                }
            }
            if(!$isFound) return $this->errorResponse('No Such User in the database',404);
            return $this->successResponse('User Verify');
        }
    }