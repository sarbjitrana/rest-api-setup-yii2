<?php

// UserController.php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use app\models\User;
use yii\web\Response;

class UserController extends ActiveController
{

    public $modelClass = 'app\models\User';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function actionSignup()
    {
        $model = new User();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        $password = Yii::$app->request->post('password');
        if(!empty($password )){
            $model->setPassword($password) ;
        }
        if ($model->save()) {
            Yii::$app->response->statusCode = 201;
            return ['message' => 'User created successfully'];
        } else {
            Yii::$app->response->statusCode = 400;
            return $model->getErrors();
        }
    }

    // UserController.php

public function actionLogin()
{
    $username = Yii::$app->request->post('username');
    $password = Yii::$app->request->post('password');

    $user = User::findByUsername($username);

    if (!$user || !$user->validatePassword($password)) {
        Yii::$app->response->statusCode = 401;
        return ['error' => 'Invalid username or password'];
    }

    // Generate access token
    $accessToken = $user->generateAccessToken();
    return ['access_token' => $accessToken];
}

// UserController.php

public function actionLogout()
{
    // Invalidate access token
    // You can implement your own logic to invalidate the token, like deleting it from the database.
    Yii::$app->response->statusCode = 200;
    return ['message' => 'User logged out successfully'];
}

// UserController.php

public function actionResetPassword()
{
    $email = Yii::$app->request->post('email');
    $user = User::findByEmail($email);

    if (!$user) {
        Yii::$app->response->statusCode = 404;
        return ['error' => 'User not found'];
    }

    // Generate and send password reset link to user's email
    // You can implement your own logic to send password reset link

    return ['message' => 'Password reset link sent successfully'];
}

// UserController.php

public function actionRefreshToken()
{
    // Implement your logic to refresh expired access tokens
    // This can involve generating a new token or extending the expiration time of the existing token
}


}

