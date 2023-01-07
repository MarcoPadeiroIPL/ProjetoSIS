<?php

namespace backend\controllers;

use backend\models\RegisterEmployee;
use backend\models\Employee;
use common\models\User;
use common\models\Airport;
use common\models\UserData;
use common\models\Client;
use common\models\Airplane;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EmployeeController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view', 'activate', 'generate', 'generate-employee', 'generate-airport', 'generate-airplane'],
                        'allow' => true,
                        'roles' => ['admin', '?'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['supervisor', 'ticketOperator'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'activate', 'update'],
                        'allow' => false,
                        'roles' => ['supervisor', 'ticketOperator'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('listEmployee'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where('auth_assignment.item_name != "client"')
                ->innerJoin('auth_assignment', 'auth_assignment.user_id = user.id')
                ->orderBy(['status' => SORT_DESC])
                ->orderBy(['id' => SORT_ASC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($user_id)
    {
        if (!\Yii::$app->user->can('readEmployee'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        if (User::findOne([\Yii::$app->user->identity->getId()])->authAssignment->item_name == 'admin')
            $user = User::findOne([$user_id]);
        else
            $user = User::findOne([\Yii::$app->user->identity->getId()]);

        return $this->render('view', [
            'model' => $user
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createEmployee'))
            throw new \yii\web\ForbiddenHttpException('Access denied');

        $model = new RegisterEmployee();

        if ($this->request->isPost && $model->load(\Yii::$app->request->post()) && $model->register()) {
            \Yii::$app->session->setFlash('success', "Employee created successfully.");
            $this->redirect(['index']);
        }

        $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');
        $roles = $this->filtrarRoles(\Yii::$app->authManager->getRoles());

        return $this->render('create', [
            'model' => $model,
            'airports' => $airports,
            'roles' => $roles
        ]);
    }

    public function actionUpdate($user_id)
    {
        if (!\Yii::$app->user->can('updateEmployee'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $user = User::findOne($user_id);

        $model = new RegisterEmployee();

        $model->setUser($user);



        if ($this->request->isPost && $model->load(\Yii::$app->request->post()) && $model->update($user_id)) {
            \Yii::$app->session->setFlash('success', "Employee updated successfully.");
            return $this->redirect(['index']);
        }

        $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');
        $roles = $this->filtrarRoles(\Yii::$app->authManager->getRoles());

        return $this->render('update', [
            'model' => $model,
            'airports' => $airports,
            'roles' => $roles
        ]);
    }

    public function actionDelete($user_id)
    {
        if (!\Yii::$app->user->can('deleteEmployee'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        if (User::findOne([$user_id])->deleteUser())
            \Yii::$app->session->setFlash('success', "Employee deleted successfully.");
        else
            \Yii::$app->session->setFlash('error', "Employee not deleted successfully.");
        return $this->redirect(['index']);
    }

    public function actionActivate($user_id)
    {
        if (!\Yii::$app->user->can('deleteEmployee'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        if (User::findOne([$user_id])->activate())
            \Yii::$app->session->setFlash('success', "Employee activated successfully.");
        else
            \Yii::$app->session->setFlash('error', "Employee not activated successfully.");
        return $this->redirect(['index']);
    }

    public function actionGenerate()
    {
        $arr = [
            ['fName' => 'Luis', 'surname' => 'Silva', 'birthdate' => '1979/11/28', 'phone' => '900166439', 'nif' => '867557855', 'gender' => 'M', 'accCreationDate' => '2012-02-13 14:55:23', 'application' => true, 'balance' => 990],
            ['fName' => 'Stepha', 'surname' => 'Shane', 'birthdate' => '1977/12/13', 'phone' => '959569671', 'nif' => '440256808', 'gender' => 'F', 'accCreationDate' => '2018-12-05 07:25:37', 'application' => true, 'balance' => 42],
            ['fName' => 'Martie', 'surname' => 'Garfit', 'birthdate' => '2005/03/22', 'phone' => '994379524', 'nif' => '447042066', 'gender' => 'F', 'accCreationDate' => '2010-06-01 12:59:52', 'application' => false, 'balance' => 970],
            ['fName' => 'Lenardo', 'surname' => 'Stonhouse', 'birthdate' => '1982/07/20', 'phone' => '905776362', 'nif' => '596917100', 'gender' => 'M', 'accCreationDate' => '2008-07-03 18:13:12', 'application' => true, 'balance' => 481],
            ['fName' => 'Reggy', 'surname' => 'Stronack', 'birthdate' => '1991/09/20', 'phone' => '952085543', 'nif' => '342972798', 'gender' => 'M', 'accCreationDate' => '2012-10-29 03:35:45', 'application' => true, 'balance' => 415],
            ['fName' => 'Evvie', 'surname' => 'Surgey', 'birthdate' => '2000/09/13', 'phone' => '980252518', 'nif' => '902233914', 'gender' => 'F', 'accCreationDate' => '2012-10-01 10:49:52', 'application' => false, 'balance' => 826],
            ['fName' => 'Chad', 'surname' => 'Candy', 'birthdate' => '1978/04/08', 'phone' => '961121116', 'nif' => '333289619', 'gender' => 'M', 'accCreationDate' => '2019-01-30 07:37:27', 'application' => false, 'balance' => 943],
            ['fName' => 'Hanny', 'surname' => 'Ousby', 'birthdate' => '1997/07/31', 'phone' => '929602413', 'nif' => '270401183', 'gender' => 'F', 'accCreationDate' => '2005-11-06 12:57:17', 'application' => true, 'balance' => 366],
            ['fName' => 'Bidget', 'surname' => 'Guerri', 'birthdate' => '1991/06/19', 'phone' => '973815959', 'nif' => '105578229', 'gender' => 'F', 'accCreationDate' => '2020-01-16 11:48:26', 'application' => false, 'balance' => 317],
            ['fName' => 'Karyn', 'surname' => 'Vigurs', 'birthdate' => '1995/05/30', 'phone' => '948467108', 'nif' => '945279539', 'gender' => 'F', 'accCreationDate' => '2016-04-19 00:58:28', 'application' => true, 'balance' => 781],
            ['fName' => 'Theodore', 'surname' => 'Mercey', 'birthdate' => '1984/10/12', 'phone' => '910061005', 'nif' => '279701748', 'gender' => 'M', 'accCreationDate' => '2006-04-24 11:38:44', 'application' => true, 'balance' => 88],
            ['fName' => 'Don', 'surname' => 'Haldin', 'birthdate' => '1978/02/22', 'phone' => '952052262', 'nif' => '763303109', 'gender' => 'M', 'accCreationDate' => '2012-01-23 11:58:45', 'application' => false, 'balance' => 594],
            ['fName' => 'Benn', 'surname' => 'Winckworth', 'birthdate' => '1979/11/02', 'phone' => '987757965', 'nif' => '580062312', 'gender' => 'M', 'accCreationDate' => '2007-11-20 17:19:43', 'application' => true, 'balance' => 431],
            ['fName' => 'Jaquelin', 'surname' => 'Gamil', 'birthdate' => '1990/03/24', 'phone' => '960728453', 'nif' => '953556891', 'gender' => 'F', 'accCreationDate' => '2010-11-10 13:53:05', 'application' => false, 'balance' => 2],
            ['fName' => 'Margie', 'surname' => 'Muffett', 'birthdate' => '1981/10/25', 'phone' => '999297757', 'nif' => '326047413', 'gender' => 'F', 'accCreationDate' => '2011-03-01 13:21:58', 'application' => false, 'balance' => 459],
            ['fName' => 'Donall', 'surname' => 'Silversmidt', 'birthdate' => '1986/06/04', 'phone' => '960834203', 'nif' => '529408830', 'gender' => 'M', 'accCreationDate' => '2010-10-26 12:00:18', 'application' => false, 'balance' => 58],
            ['fName' => 'Angil', 'surname' => 'Lockie', 'birthdate' => '2005/05/29', 'phone' => '932423058', 'nif' => '499948659', 'gender' => 'F', 'accCreationDate' => '2014-09-03 10:28:22', 'application' => false, 'balance' => 598],
            ['fName' => 'Zedekiah', 'surname' => 'Murton', 'birthdate' => '1986/09/10', 'phone' => '972368965', 'nif' => '811415413', 'gender' => 'M', 'accCreationDate' => '2014-11-25 14:34:42', 'application' => true, 'balance' => 472],
            ['fName' => 'Derwin', 'surname' => 'MacAless', 'birthdate' => '1998/02/02', 'phone' => '968107764', 'nif' => '915714889', 'gender' => 'M', 'accCreationDate' => '2012-10-29 14:03:53', 'application' => true, 'balance' => 944],
            ['fName' => 'Ailene', 'surname' => 'Warmisham', 'birthdate' => '1977/10/13', 'phone' => '938332801', 'nif' => '419647682', 'gender' => 'F', 'accCreationDate' => '2015-04-12 16:35:23', 'application' => true, 'balance' => 31],
            ['fName' => 'Georgie', 'surname' => 'Ulyat', 'birthdate' => '1978/04/03', 'phone' => '906100635', 'nif' => '944723624', 'gender' => 'M', 'accCreationDate' => '2013-11-29 15:46:27', 'application' => true, 'balance' => 333],
            ['fName' => 'Griffin', 'surname' => 'Cinelli', 'birthdate' => '1981/05/21', 'phone' => '924942382', 'nif' => '959523029', 'gender' => 'M', 'accCreationDate' => '2011-01-31 15:49:43', 'application' => true, 'balance' => 911],
            ['fName' => 'Lorrin', 'surname' => 'Wormleighton', 'birthdate' => '1978/11/06', 'phone' => '977927484', 'nif' => '704751533', 'gender' => 'F', 'accCreationDate' => '2012-09-08 06:39:21', 'application' => false, 'balance' => 877],
            ['fName' => 'Arvin', 'surname' => 'Biaggiotti', 'birthdate' => '2003/02/05', 'phone' => '915177421', 'nif' => '328013739', 'gender' => 'M', 'accCreationDate' => '2006-11-26 06:27:59', 'application' => true, 'balance' => 435],
            ['fName' => 'Edyth', 'surname' => 'Coopman', 'birthdate' => '2001/06/05', 'phone' => '951367935', 'nif' => '553838420', 'gender' => 'F', 'accCreationDate' => '2018-12-13 13:17:44', 'application' => true, 'balance' => 903],
            ['fName' => 'Alecia', 'surname' => 'Besson', 'birthdate' => '2004/07/09', 'phone' => '996606682', 'nif' => '695644892', 'gender' => 'F', 'accCreationDate' => '2015-02-08 23:37:51', 'application' => false, 'balance' => 935],
            ['fName' => 'Malinda', 'surname' => 'Le Borgne', 'birthdate' => '1989/11/28', 'phone' => '939364986', 'nif' => '553193408', 'gender' => 'F', 'accCreationDate' => '2018-03-12 04:53:43', 'application' => false, 'balance' => 569],
            ['fName' => 'Lane', 'surname' => 'Thurlborn', 'birthdate' => '1977/06/08', 'phone' => '928378504', 'nif' => '674306411', 'gender' => 'F', 'accCreationDate' => '2021-03-17 08:47:49', 'application' => false, 'balance' => 471],
            ['fName' => 'Barth', 'surname' => 'Furbank', 'birthdate' => '2004/04/13', 'phone' => '915071134', 'nif' => '192852598', 'gender' => 'M', 'accCreationDate' => '2009-01-03 18:35:31', 'application' => true, 'balance' => 319],
            ['fName' => 'Cirillo', 'surname' => 'Pickvance', 'birthdate' => '1998/11/09', 'phone' => '925816627', 'nif' => '948700596', 'gender' => 'M', 'accCreationDate' => '2019-10-29 05:12:25', 'application' => false, 'balance' => 291],
            ['fName' => 'Alexina', 'surname' => 'Costin', 'birthdate' => '1996/07/15', 'phone' => '940000226', 'nif' => '314284264', 'gender' => 'F', 'accCreationDate' => '2017-10-05 00:31:53', 'application' => true, 'balance' => 571],
            ['fName' => 'Abba', 'surname' => 'Chapellow', 'birthdate' => '1983/01/16', 'phone' => '985940491', 'nif' => '384125395', 'gender' => 'M', 'accCreationDate' => '2018-02-27 17:19:19', 'application' => false, 'balance' => 553],
            ['fName' => 'Sibyl', 'surname' => 'Bottinelli', 'birthdate' => '1979/06/07', 'phone' => '924021768', 'nif' => '663970956', 'gender' => 'F', 'accCreationDate' => '2015-04-17 19:10:41', 'application' => true, 'balance' => 303],
            ['fName' => 'Olwen', 'surname' => 'Pyne', 'birthdate' => '1995/04/29', 'phone' => '930005921', 'nif' => '122590753', 'gender' => 'F', 'accCreationDate' => '2007-04-05 10:58:31', 'application' => true, 'balance' => 76],
            ['fName' => 'Osbourne', 'surname' => 'Bagworth', 'birthdate' => '1995/08/23', 'phone' => '960226819', 'nif' => '814101095', 'gender' => 'M', 'accCreationDate' => '2013-02-24 15:59:28', 'application' => false, 'balance' => 10],
            ['fName' => 'Germain', 'surname' => 'Edgerly', 'birthdate' => '1999/06/19', 'phone' => '974453215', 'nif' => '472402504', 'gender' => 'M', 'accCreationDate' => '2011-10-05 08:55:04', 'application' => false, 'balance' => 274],
            ['fName' => 'Patty', 'surname' => 'Mosley', 'birthdate' => '1985/05/25', 'phone' => '965038082', 'nif' => '931536715', 'gender' => 'M', 'accCreationDate' => '2009-10-23 22:49:40', 'application' => false, 'balance' => 219],
            ['fName' => 'Leann', 'surname' => 'Guidetti', 'birthdate' => '1998/10/08', 'phone' => '947704934', 'nif' => '864560834', 'gender' => 'F', 'accCreationDate' => '2008-05-09 21:15:58', 'application' => true, 'balance' => 493],
            ['fName' => 'Stanly', 'surname' => 'Cready', 'birthdate' => '1981/06/14', 'phone' => '939861602', 'nif' => '630861219', 'gender' => 'M', 'accCreationDate' => '2019-05-14 12:33:07', 'application' => true, 'balance' => 958],
            ['fName' => 'Brandais', 'surname' => 'Coakley', 'birthdate' => '1997/04/26', 'phone' => '949677920', 'nif' => '764904930', 'gender' => 'F', 'accCreationDate' => '2006-02-03 07:42:16', 'application' => true, 'balance' => 203],
            ['fName' => 'Paolina', 'surname' => 'Sabban', 'birthdate' => '2005/08/27', 'phone' => '921520447', 'nif' => '365968047', 'gender' => 'F', 'accCreationDate' => '2009-04-26 12:38:20', 'application' => true, 'balance' => 961],
            ['fName' => 'Harmony', 'surname' => 'Berthouloume', 'birthdate' => '1981/05/16', 'phone' => '963069997', 'nif' => '906496661', 'gender' => 'F', 'accCreationDate' => '2017-04-06 09:18:40', 'application' => false, 'balance' => 499],
            ['fName' => 'Nani', 'surname' => 'Feavyour', 'birthdate' => '1997/11/14', 'phone' => '901576566', 'nif' => '680028554', 'gender' => 'F', 'accCreationDate' => '2015-10-19 19:51:19', 'application' => false, 'balance' => 713],
            ['fName' => 'Edwina', 'surname' => 'Yusupov', 'birthdate' => '1982/04/30', 'phone' => '936823434', 'nif' => '330002975', 'gender' => 'F', 'accCreationDate' => '2008-07-29 21:38:53', 'application' => true, 'balance' => 565],
            ['fName' => 'Thor', 'surname' => 'Confait', 'birthdate' => '1984/07/13', 'phone' => '934213268', 'nif' => '630450916', 'gender' => 'M', 'accCreationDate' => '2007-12-29 13:40:45', 'application' => false, 'balance' => 736],
            ['fName' => 'Riccardo', 'surname' => 'Stollman', 'birthdate' => '1985/10/30', 'phone' => '959388421', 'nif' => '560912327', 'gender' => 'M', 'accCreationDate' => '2005-02-12 17:09:58', 'application' => true, 'balance' => 736],
            ['fName' => 'Cosetta', 'surname' => 'Tansly', 'birthdate' => '1981/07/09', 'phone' => '936623578', 'nif' => '720362467', 'gender' => 'F', 'accCreationDate' => '2007-04-01 02:11:14', 'application' => false, 'balance' => 362],
            ['fName' => 'Lara', 'surname' => 'Kelberman', 'birthdate' => '1999/04/28', 'phone' => '999239314', 'nif' => '172960019', 'gender' => 'F', 'accCreationDate' => '2020-05-17 05:54:21', 'application' => true, 'balance' => 297],
            ['fName' => 'Gretel', 'surname' => 'Swaisland', 'birthdate' => '2003/04/16', 'phone' => '976445817', 'nif' => '722450773', 'gender' => 'F', 'accCreationDate' => '2012-05-01 06:35:15', 'application' => true, 'balance' => 631],
            ['fName' => 'Talbert', 'surname' => 'Gabitis', 'birthdate' => '2001/06/11', 'phone' => '942625419', 'nif' => '496781408', 'gender' => 'M', 'accCreationDate' => '2014-11-17 00:25:05', 'application' => true, 'balance' => 935],
            ['fName' => 'Ezechiel', 'surname' => 'Oolahan', 'birthdate' => '2000/09/22', 'phone' => '930029945', 'nif' => '817142483', 'gender' => 'M', 'accCreationDate' => '2008-04-23 04:21:46', 'application' => false, 'balance' => 201],
            ['fName' => 'Nicol', 'surname' => 'Gebbe', 'birthdate' => '1982/11/15', 'phone' => '992017514', 'nif' => '590411481', 'gender' => 'M', 'accCreationDate' => '2012-10-13 17:12:50', 'application' => true, 'balance' => 937],
            ['fName' => 'Kelby', 'surname' => 'Quinn', 'birthdate' => '1976/05/11', 'phone' => '961852299', 'nif' => '165782371', 'gender' => 'M', 'accCreationDate' => '2009-05-02 07:00:33', 'application' => false, 'balance' => 15],
            ['fName' => 'Jennifer', 'surname' => 'Puckett', 'birthdate' => '2003/08/18', 'phone' => '919332473', 'nif' => '888121718', 'gender' => 'F', 'accCreationDate' => '2020-05-09 18:44:48', 'application' => false, 'balance' => 966],
            ['fName' => 'Shandee', 'surname' => 'Allright', 'birthdate' => '1984/09/13', 'phone' => '962837463', 'nif' => '179906741', 'gender' => 'F', 'accCreationDate' => '2021-03-20 14:13:51', 'application' => true, 'balance' => 635],
            ['fName' => 'Vinson', 'surname' => 'Sygrove', 'birthdate' => '1978/02/14', 'phone' => '963911210', 'nif' => '490849381', 'gender' => 'M', 'accCreationDate' => '2018-03-04 16:25:20', 'application' => false, 'balance' => 92],
            ['fName' => 'Belicia', 'surname' => 'Coupman', 'birthdate' => '1985/11/15', 'phone' => '960622226', 'nif' => '287605925', 'gender' => 'F', 'accCreationDate' => '2020-07-31 09:00:27', 'application' => false, 'balance' => 828],
            ['fName' => 'Jaclin', 'surname' => 'Silverstone', 'birthdate' => '1991/10/29', 'phone' => '972099262', 'nif' => '265819222', 'gender' => 'F', 'accCreationDate' => '2005-03-18 04:49:11', 'application' => false, 'balance' => 815],
            ['fName' => 'Andree', 'surname' => 'Morgan', 'birthdate' => '2003/06/03', 'phone' => '956114151', 'nif' => '160774425', 'gender' => 'F', 'accCreationDate' => '2008-08-19 01:26:33', 'application' => false, 'balance' => 794],
            ['fName' => 'Louis', 'surname' => 'Culshaw', 'birthdate' => '1977/12/13', 'phone' => '992575780', 'nif' => '461682841', 'gender' => 'M', 'accCreationDate' => '2014-02-11 01:58:45', 'application' => false, 'balance' => 102],

        ];
        foreach ($arr as $pessoa) {
            $user = new User();
            $userData = new UserData();
            $client = new Client();

            // tabela USER
            $user->username = strtolower($pessoa['fName']);
            $user->email = strtolower($pessoa['fName']) . "@gmail.com";
            $user->setPassword(strtolower($pessoa['fName']) . '123');
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->status = 10;

            $user->save();
            $auth = \Yii::$app->authManager;
            $role = $auth->getRole("client");
            $auth->assign($role, $user->getId());

            $client->user_id = $user->getId();
            $client->application = $pessoa['application'];
            $client->balance = $pessoa['balance'];

            $client->save();

            // tabela USERDATA
            $userData->user_id = $user->getId();
            $userData->fName = $pessoa['fName'];
            $userData->surname = $pessoa['surname'];
            $userData->birthdate = date('Y/m/d', strtotime($pessoa['birthdate']));
            $userData->phone = $pessoa['phone'];
            $userData->nif = $pessoa['nif'];
            $userData->gender = $pessoa['gender'];
            $userData->accCreationDate = $pessoa['accCreationDate'];

            $userData->save();
        }
    }

    public function actionGenerateEmployee()
    {
        $arr = [
            ['fName' => 'Diogo', 'surname' => 'Pedro', 'birthdate' => '2002/01/06', 'phone' => '932840128', 'nif' => '304959905', 'gender' => 'M', 'accCreationDate' => '2005-07-02 15:14:16', 'salary' => 2483, 'airport_id' => 5, 'role' => 1],
            ['fName' => 'Quintina', 'surname' => 'Cecere', 'birthdate' => '2002/06/13', 'phone' => '932840778', 'nif' => '304399905', 'gender' => 'F', 'accCreationDate' => '2019-11-02 22:08:10', 'salary' => 1787, 'airport_id' => 21, 'role' => 1],
            ['fName' => 'Pieter', 'surname' => 'Ritchley', 'birthdate' => '1972/07/31', 'phone' => '972129007', 'nif' => '306338022', 'gender' => 'M', 'accCreationDate' => '2007-07-28 15:42:02', 'salary' => 2190, 'airport_id' => 8, 'role' => 3],
            ['fName' => 'Calypso', 'surname' => 'Bush', 'birthdate' => '1979/05/23', 'phone' => '902748891', 'nif' => '404852787', 'gender' => 'F', 'accCreationDate' => '2011-07-01 03:47:10', 'salary' => 2367, 'airport_id' => 25, 'role' => 2],
            ['fName' => 'Dougie', 'surname' => 'Panketh', 'birthdate' => '1999/08/13', 'phone' => '984233790', 'nif' => '436268321', 'gender' => 'M', 'accCreationDate' => '2016-10-30 01:06:57', 'salary' => 2168, 'airport_id' => 17, 'role' => 2],
            ['fName' => 'Natka', 'surname' => 'Bason', 'birthdate' => '1973/02/17', 'phone' => '936191171', 'nif' => '593122317', 'gender' => 'F', 'accCreationDate' => '2006-04-03 07:15:14', 'salary' => 1707, 'airport_id' => 9, 'role' => 3],
            ['fName' => 'Titus', 'surname' => 'Olufsen', 'birthdate' => '1962/06/09', 'phone' => '976757820', 'nif' => '734650250', 'gender' => 'M', 'accCreationDate' => '2021-04-29 15:58:21', 'salary' => 2287, 'airport_id' => 7, 'role' => 3],
            ['fName' => 'Chaim', 'surname' => 'Belbin', 'birthdate' => '2003/12/05', 'phone' => '963094874', 'nif' => '871973411', 'gender' => 'M', 'accCreationDate' => '2014-01-22 08:24:01', 'salary' => 1319, 'airport_id' => 6, 'role' => 3],
            ['fName' => 'Merill', 'surname' => 'Stobie', 'birthdate' => '1993/10/23', 'phone' => '926273593', 'nif' => '833033475', 'gender' => 'M', 'accCreationDate' => '2019-06-30 17:15:54', 'salary' => 1823, 'airport_id' => 15, 'role' => 3],
            ['fName' => 'Tuckie', 'surname' => 'Berfoot', 'birthdate' => '1968/06/05', 'phone' => '950150818', 'nif' => '640583527', 'gender' => 'M', 'accCreationDate' => '2010-01-16 11:18:58', 'salary' => 2312, 'airport_id' => 4, 'role' => 3],
            ['fName' => 'Aldric', 'surname' => 'Bovaird', 'birthdate' => '2003/01/18', 'phone' => '978950514', 'nif' => '164035232', 'gender' => 'M', 'accCreationDate' => '2010-03-02 08:45:04', 'salary' => 1026, 'airport_id' => 21, 'role' => 2],
            ['fName' => 'Ignazio', 'surname' => 'Avann', 'birthdate' => '1985/03/02', 'phone' => '905157650', 'nif' => '313726914', 'gender' => 'M', 'accCreationDate' => '2019-09-22 21:11:11', 'salary' => 1341, 'airport_id' => 10, 'role' => 3],
            ['fName' => 'Valerye', 'surname' => 'Alderwick', 'birthdate' => '1988/07/06', 'phone' => '943494518', 'nif' => '667224231', 'gender' => 'F', 'accCreationDate' => '2008-07-28 11:04:43', 'salary' => 1910, 'airport_id' => 21, 'role' => 2],
            ['fName' => 'Imogen', 'surname' => 'Reiling', 'birthdate' => '1974/10/05', 'phone' => '997885212', 'nif' => '519628586', 'gender' => 'F', 'accCreationDate' => '2014-08-08 10:45:57', 'salary' => 2240, 'airport_id' => 10, 'role' => 2],
            ['fName' => 'Ellyn', 'surname' => 'Kezourec', 'birthdate' => '1963/11/05', 'phone' => '955004435', 'nif' => '729776958', 'gender' => 'F', 'accCreationDate' => '2022-06-21 16:18:30', 'salary' => 1842, 'airport_id' => 21, 'role' => 2],
            ['fName' => 'Thorsten', 'surname' => 'Wroughton', 'birthdate' => '1994/08/29', 'phone' => '987291996', 'nif' => '221545575', 'gender' => 'M', 'accCreationDate' => '2007-07-29 21:11:59', 'salary' => 1848, 'airport_id' => 24, 'role' => 3],
            ['fName' => 'Town', 'surname' => 'Wenderoth', 'birthdate' => '1969/08/16', 'phone' => '931449908', 'nif' => '208788746', 'gender' => 'M', 'accCreationDate' => '2013-01-13 23:10:41', 'salary' => 1606, 'airport_id' => 13, 'role' => 1],
            ['fName' => 'Kirk', 'surname' => 'Gristhwaite', 'birthdate' => '1996/02/20', 'phone' => '962983254', 'nif' => '666135090', 'gender' => 'M', 'accCreationDate' => '2016-03-28 02:01:09', 'salary' => 1743, 'airport_id' => 12, 'role' => 2],
            ['fName' => 'Schuyler', 'surname' => 'Dighton', 'birthdate' => '1976/07/27', 'phone' => '935972125', 'nif' => '724034572', 'gender' => 'M', 'accCreationDate' => '2019-09-16 02:17:21', 'salary' => 993, 'airport_id' => 18, 'role' => 3],
            ['fName' => 'Andreana', 'surname' => 'Sieur', 'birthdate' => '1980/02/14', 'phone' => '953252696', 'nif' => '732375633', 'gender' => 'F', 'accCreationDate' => '2020-02-27 09:44:20', 'salary' => 1615, 'airport_id' => 10, 'role' => 3],
            ['fName' => 'Baily', 'surname' => 'Filyashin', 'birthdate' => '1963/10/04', 'phone' => '915611176', 'nif' => '929493263', 'gender' => 'M', 'accCreationDate' => '2005-01-14 01:22:15', 'salary' => 1756, 'airport_id' => 14, 'role' => 3],
            ['fName' => 'Wilow', 'surname' => 'Wingeat', 'birthdate' => '2002/08/16', 'phone' => '905029586', 'nif' => '402838075', 'gender' => 'F', 'accCreationDate' => '2010-09-21 20:21:39', 'salary' => 2238, 'airport_id' => 13, 'role' => 1],
            ['fName' => 'Kenn', 'surname' => 'Foxten', 'birthdate' => '1992/06/19', 'phone' => '911216019', 'nif' => '897958862', 'gender' => 'M', 'accCreationDate' => '2009-03-30 23:38:30', 'salary' => 1144, 'airport_id' => 25, 'role' => 2],
            ['fName' => 'Kev', 'surname' => 'Darque', 'birthdate' => '1981/04/08', 'phone' => '908815440', 'nif' => '358995378', 'gender' => 'M', 'accCreationDate' => '2021-06-22 08:17:41', 'salary' => 2146, 'airport_id' => 14, 'role' => 3],
            ['fName' => 'Rozella', 'surname' => 'Kmietsch', 'birthdate' => '1995/05/15', 'phone' => '978085656', 'nif' => '429274345', 'gender' => 'F', 'accCreationDate' => '2021-08-20 10:37:04', 'salary' => 987, 'airport_id' => 25, 'role' => 3],
            ['fName' => 'Mildred', 'surname' => 'Tugwell', 'birthdate' => '1993/12/06', 'phone' => '978317803', 'nif' => '177283409', 'gender' => 'F', 'accCreationDate' => '2010-04-12 04:49:24', 'salary' => 2311, 'airport_id' => 23, 'role' => 3],
            ['fName' => 'Bonny', 'surname' => 'Ritchie', 'birthdate' => '2003/08/10', 'phone' => '987282770', 'nif' => '158427308', 'gender' => 'F', 'accCreationDate' => '2010-07-15 03:49:48', 'salary' => 2359, 'airport_id' => 5, 'role' => 2],
            ['fName' => 'Melony', 'surname' => 'Greeves', 'birthdate' => '1985/09/21', 'phone' => '939241103', 'nif' => '984246965', 'gender' => 'F', 'accCreationDate' => '2006-11-05 00:46:52', 'salary' => 1964, 'airport_id' => 16, 'role' => 1],
            ['fName' => 'Aprilette', 'surname' => 'Argrave', 'birthdate' => '1984/05/05', 'phone' => '964440036', 'nif' => '189230220', 'gender' => 'F', 'accCreationDate' => '2018-09-08 15:36:35', 'salary' => 2463, 'airport_id' => 22, 'role' => 1],
            ['fName' => 'Elinore', 'surname' => 'Nuzzi', 'birthdate' => '1965/09/02', 'phone' => '967823649', 'nif' => '242037736', 'gender' => 'F', 'accCreationDate' => '2013-04-07 04:14:27', 'salary' => 2228, 'airport_id' => 9, 'role' => 2],
            ['fName' => 'Dulciana', 'surname' => 'Midford', 'birthdate' => '1981/10/30', 'phone' => '923987634', 'nif' => '539197252', 'gender' => 'F', 'accCreationDate' => '2017-07-24 10:02:11', 'salary' => 2468, 'airport_id' => 8, 'role' => 2],
            ['fName' => 'Donia', 'surname' => 'Deeks', 'birthdate' => '1967/04/29', 'phone' => '950336507', 'nif' => '190239156', 'gender' => 'F', 'accCreationDate' => '2012-01-14 06:10:00', 'salary' => 1902, 'airport_id' => 19, 'role' => 1],
            ['fName' => 'Abraham', 'surname' => 'Pillifant', 'birthdate' => '1989/07/24', 'phone' => '976759633', 'nif' => '121526685', 'gender' => 'M', 'accCreationDate' => '2008-08-24 13:09:23', 'salary' => 2318, 'airport_id' => 14, 'role' => 1],
            ['fName' => 'Gerty', 'surname' => 'Mebius', 'birthdate' => '1964/10/04', 'phone' => '929990647', 'nif' => '641633486', 'gender' => 'F', 'accCreationDate' => '2015-03-05 09:14:37', 'salary' => 1841, 'airport_id' => 7, 'role' => 3],
            ['fName' => 'Barbi', 'surname' => 'Brotherhead', 'birthdate' => '1998/06/14', 'phone' => '942963950', 'nif' => '559279606', 'gender' => 'F', 'accCreationDate' => '2009-01-24 19:56:26', 'salary' => 1038, 'airport_id' => 17, 'role' => 3],
            ['fName' => 'Hall', 'surname' => 'Lelievre', 'birthdate' => '1982/11/27', 'phone' => '916160760', 'nif' => '254151525', 'gender' => 'M', 'accCreationDate' => '2020-01-26 15:18:00', 'salary' => 1503, 'airport_id' => 17, 'role' => 1],
            ['fName' => 'Tiler', 'surname' => 'Kabos', 'birthdate' => '1987/04/08', 'phone' => '975164706', 'nif' => '389649609', 'gender' => 'M', 'accCreationDate' => '2009-12-19 16:33:35', 'salary' => 1737, 'airport_id' => 25, 'role' => 2],
            ['fName' => 'Rod', 'surname' => 'Ucceli', 'birthdate' => '1977/08/18', 'phone' => '959841948', 'nif' => '888802945', 'gender' => 'M', 'accCreationDate' => '2012-10-31 11:42:24', 'salary' => 916, 'airport_id' => 6, 'role' => 1],
            ['fName' => 'Brunhilda', 'surname' => 'Seczyk', 'birthdate' => '1967/05/31', 'phone' => '981750531', 'nif' => '452031768', 'gender' => 'F', 'accCreationDate' => '2018-01-27 15:18:58', 'salary' => 1331, 'airport_id' => 14, 'role' => 1],
            ['fName' => 'Sandy', 'surname' => 'Shilliday', 'birthdate' => '1982/10/15', 'phone' => '923906089', 'nif' => '966927220', 'gender' => 'M', 'accCreationDate' => '2011-09-04 13:37:39', 'salary' => 2021, 'airport_id' => 12, 'role' => 2],
            ['fName' => 'Hyacintha', 'surname' => 'Beasant', 'birthdate' => '1973/05/08', 'phone' => '972265260', 'nif' => '735516435', 'gender' => 'F', 'accCreationDate' => '2020-08-07 09:08:43', 'salary' => 1488, 'airport_id' => 10, 'role' => 1],
            ['fName' => 'Kristine', 'surname' => 'Babington', 'birthdate' => '1970/05/08', 'phone' => '933788197', 'nif' => '159965230', 'gender' => 'F', 'accCreationDate' => '2010-04-30 22:00:17', 'salary' => 2313, 'airport_id' => 14, 'role' => 3],
            ['fName' => 'Innis', 'surname' => 'Sunderland', 'birthdate' => '1998/07/05', 'phone' => '909412463', 'nif' => '582740968', 'gender' => 'M', 'accCreationDate' => '2018-05-23 00:22:10', 'salary' => 1436, 'airport_id' => 24, 'role' => 2],
            ['fName' => 'Delmer', 'surname' => 'Vogel', 'birthdate' => '1987/08/01', 'phone' => '981192001', 'nif' => '845517127', 'gender' => 'M', 'accCreationDate' => '2017-04-07 21:29:20', 'salary' => 1996, 'airport_id' => 14, 'role' => 3],
            ['fName' => 'Marlane', 'surname' => 'Eastbrook', 'birthdate' => '1981/10/05', 'phone' => '974572089', 'nif' => '194318892', 'gender' => 'F', 'accCreationDate' => '2021-07-20 01:37:58', 'salary' => 1746, 'airport_id' => 20, 'role' => 2],
            ['fName' => 'Opaline', 'surname' => 'Skelington', 'birthdate' => '1968/08/10', 'phone' => '950006291', 'nif' => '468045793', 'gender' => 'F', 'accCreationDate' => '2011-02-02 11:50:02', 'salary' => 2293, 'airport_id' => 12, 'role' => 1],
            ['fName' => 'Tobiah', 'surname' => 'Hearons', 'birthdate' => '1960/09/23', 'phone' => '983851503', 'nif' => '566676229', 'gender' => 'M', 'accCreationDate' => '2006-09-21 20:00:16', 'salary' => 1543, 'airport_id' => 12, 'role' => 2],
            ['fName' => 'Graeme', 'surname' => 'Mateev', 'birthdate' => '1988/07/24', 'phone' => '921079089', 'nif' => '701108669', 'gender' => 'M', 'accCreationDate' => '2013-09-18 18:32:35', 'salary' => 1380, 'airport_id' => 19, 'role' => 1],
            ['fName' => 'Shanon', 'surname' => 'Dripp', 'birthdate' => '1981/04/11', 'phone' => '964689113', 'nif' => '200750882', 'gender' => 'F', 'accCreationDate' => '2021-03-30 13:41:01', 'salary' => 2256, 'airport_id' => 23, 'role' => 2],
            ['fName' => 'Ermanno', 'surname' => 'Middle', 'birthdate' => '1998/04/25', 'phone' => '926684869', 'nif' => '196692582', 'gender' => 'M', 'accCreationDate' => '2012-03-20 20:30:41', 'salary' => 1763, 'airport_id' => 10, 'role' => 3],
            ['fName' => 'Philippe', 'surname' => 'Kitson', 'birthdate' => '1992/02/19', 'phone' => '947375472', 'nif' => '843024102', 'gender' => 'F', 'accCreationDate' => '2006-05-16 17:53:54', 'salary' => 1355, 'airport_id' => 16, 'role' => 2],
            ['fName' => 'Addie', 'surname' => 'Echelle', 'birthdate' => '1979/11/22', 'phone' => '939556750', 'nif' => '464360936', 'gender' => 'M', 'accCreationDate' => '2005-12-04 04:26:01', 'salary' => 2069, 'airport_id' => 5, 'role' => 2],
            ['fName' => 'Carole', 'surname' => 'Sweed', 'birthdate' => '1985/01/07', 'phone' => '950936643', 'nif' => '287002157', 'gender' => 'F', 'accCreationDate' => '2018-01-17 03:47:45', 'salary' => 1323, 'airport_id' => 22, 'role' => 3],
            ['fName' => 'Lenard', 'surname' => 'Sprigging', 'birthdate' => '1967/10/21', 'phone' => '982383289', 'nif' => '430804384', 'gender' => 'M', 'accCreationDate' => '2017-09-28 00:09:16', 'salary' => 1653, 'airport_id' => 22, 'role' => 2],
            ['fName' => 'Twila', 'surname' => 'Gault', 'birthdate' => '1971/09/04', 'phone' => '966921873', 'nif' => '213888766', 'gender' => 'F', 'accCreationDate' => '2007-03-23 20:08:32', 'salary' => 1799, 'airport_id' => 17, 'role' => 2],
            ['fName' => 'Marcellina', 'surname' => 'Tourry', 'birthdate' => '1971/11/14', 'phone' => '999509393', 'nif' => '191735126', 'gender' => 'F', 'accCreationDate' => '2022-01-30 17:51:21', 'salary' => 1573, 'airport_id' => 25, 'role' => 2],
            ['fName' => 'Bryant', 'surname' => 'Swinley', 'birthdate' => '1970/11/11', 'phone' => '982141770', 'nif' => '210440236', 'gender' => 'M', 'accCreationDate' => '2018-10-26 13:24:14', 'salary' => 1904, 'airport_id' => 19, 'role' => 2],
            ['fName' => 'Gail', 'surname' => 'Tezure', 'birthdate' => '1980/12/29', 'phone' => '975286483', 'nif' => '143515185', 'gender' => 'M', 'accCreationDate' => '2022-08-05 07:52:11', 'salary' => 2134, 'airport_id' => 9, 'role' => 2],
            ['fName' => 'Charisse', 'surname' => 'Pakes', 'birthdate' => '1982/06/25', 'phone' => '968774654', 'nif' => '757144144', 'gender' => 'F', 'accCreationDate' => '2018-03-08 10:31:04', 'salary' => 1278, 'airport_id' => 22, 'role' => 1],
            ['fName' => 'Rowen', 'surname' => 'Girdler', 'birthdate' => '2001/10/10', 'phone' => '954957711', 'nif' => '687899255', 'gender' => 'M', 'accCreationDate' => '2017-08-06 09:12:01', 'salary' => 1378, 'airport_id' => 13, 'role' => 2],
            ['fName' => 'Kriste', 'surname' => 'Shard', 'birthdate' => '1965/08/11', 'phone' => '933078349', 'nif' => '297514187', 'gender' => 'F', 'accCreationDate' => '2017-02-16 14:54:51', 'salary' => 1770, 'airport_id' => 21, 'role' => 2],
            ['fName' => 'Mitzi', 'surname' => 'Corley', 'birthdate' => '1962/05/09', 'phone' => '916346221', 'nif' => '499902710', 'gender' => 'F', 'accCreationDate' => '2021-10-30 07:03:20', 'salary' => 2194, 'airport_id' => 21, 'role' => 3],
            ['fName' => 'Reinwald', 'surname' => 'Talmadge', 'birthdate' => '1985/07/17', 'phone' => '923516250', 'nif' => '454756895', 'gender' => 'M', 'accCreationDate' => '2018-09-12 03:37:31', 'salary' => 873, 'airport_id' => 14, 'role' => 3],
            ['fName' => 'Ximenez', 'surname' => 'Huton', 'birthdate' => '1969/05/27', 'phone' => '924567496', 'nif' => '952124410', 'gender' => 'M', 'accCreationDate' => '2021-09-07 22:32:45', 'salary' => 1675, 'airport_id' => 16, 'role' => 1],
            ['fName' => 'Ted', 'surname' => 'Kornalik', 'birthdate' => '1996/10/01', 'phone' => '993729336', 'nif' => '345884635', 'gender' => 'F', 'accCreationDate' => '2018-05-30 12:03:10', 'salary' => 1256, 'airport_id' => 5, 'role' => 3],
            ['fName' => 'Norri', 'surname' => 'Townrow', 'birthdate' => '1960/11/07', 'phone' => '975499608', 'nif' => '915213550', 'gender' => 'F', 'accCreationDate' => '2008-01-02 00:58:43', 'salary' => 2423, 'airport_id' => 23, 'role' => 2],
            ['fName' => 'Grace', 'surname' => 'Lapley', 'birthdate' => '1980/09/22', 'phone' => '983799003', 'nif' => '466235668', 'gender' => 'M', 'accCreationDate' => '2007-10-14 10:09:59', 'salary' => 1455, 'airport_id' => 24, 'role' => 2],
            ['fName' => 'Kathleen', 'surname' => 'Peepall', 'birthdate' => '1970/12/13', 'phone' => '918456757', 'nif' => '190368956', 'gender' => 'F', 'accCreationDate' => '2012-10-10 07:39:55', 'salary' => 2046, 'airport_id' => 11, 'role' => 3],
            ['fName' => 'Beryl', 'surname' => 'Sallarie', 'birthdate' => '2003/03/01', 'phone' => '919109584', 'nif' => '512322171', 'gender' => 'F', 'accCreationDate' => '2010-11-24 16:14:30', 'salary' => 826, 'airport_id' => 24, 'role' => 2],
            ['fName' => 'Priscilla', 'surname' => 'Burnhard', 'birthdate' => '1973/03/18', 'phone' => '961438824', 'nif' => '958926965', 'gender' => 'F', 'accCreationDate' => '2012-06-16 21:06:15', 'salary' => 2386, 'airport_id' => 24, 'role' => 2],
            ['fName' => 'Rustie', 'surname' => 'McKim', 'birthdate' => '1992/09/25', 'phone' => '962292662', 'nif' => '303752021', 'gender' => 'M', 'accCreationDate' => '2012-01-29 22:00:59', 'salary' => 1425, 'airport_id' => 23, 'role' => 2],
            ['fName' => 'Evelina', 'surname' => 'Bricket', 'birthdate' => '1998/04/14', 'phone' => '957808380', 'nif' => '688918115', 'gender' => 'F', 'accCreationDate' => '2005-01-26 13:10:07', 'salary' => 836, 'airport_id' => 8, 'role' => 2],
            ['fName' => 'Elisa', 'surname' => 'Suthworth', 'birthdate' => '1979/05/04', 'phone' => '912859120', 'nif' => '288109862', 'gender' => 'F', 'accCreationDate' => '2005-09-28 03:19:29', 'salary' => 1420, 'airport_id' => 25, 'role' => 2],
            ['fName' => 'Taylor', 'surname' => 'Dyett', 'birthdate' => '1973/04/20', 'phone' => '965030155', 'nif' => '446336816', 'gender' => 'M', 'accCreationDate' => '2019-07-06 18:21:04', 'salary' => 1043, 'airport_id' => 11, 'role' => 3],
            ['fName' => 'Hal', 'surname' => 'Lenahan', 'birthdate' => '1977/11/29', 'phone' => '994528434', 'nif' => '457383732', 'gender' => 'M', 'accCreationDate' => '2009-10-01 00:27:25', 'salary' => 2242, 'airport_id' => 16, 'role' => 2],
            ['fName' => 'Marnia', 'surname' => 'Laffan', 'birthdate' => '1990/11/28', 'phone' => '968668242', 'nif' => '932375480', 'gender' => 'F', 'accCreationDate' => '2007-01-06 12:11:40', 'salary' => 2225, 'airport_id' => 21, 'role' => 2],
            ['fName' => 'Hilary', 'surname' => 'Siddle', 'birthdate' => '1989/06/23', 'phone' => '935105858', 'nif' => '315483725', 'gender' => 'F', 'accCreationDate' => '2015-07-16 18:03:27', 'salary' => 1575, 'airport_id' => 11, 'role' => 3],
            ['fName' => 'Lorine', 'surname' => 'Kerley', 'birthdate' => '1979/12/18', 'phone' => '937924045', 'nif' => '495050549', 'gender' => 'F', 'accCreationDate' => '2020-04-02 00:20:39', 'salary' => 2251, 'airport_id' => 28, 'role' => 2],
            ['fName' => 'Turner', 'surname' => 'Tavinor', 'birthdate' => '1998/01/18', 'phone' => '925762740', 'nif' => '358297759', 'gender' => 'M', 'accCreationDate' => '2022-04-19 08:28:01', 'salary' => 2204, 'airport_id' => 15, 'role' => 3],
            ['fName' => 'Ambrosi', 'surname' => 'Buckles', 'birthdate' => '1981/12/31', 'phone' => '900526681', 'nif' => '344176289', 'gender' => 'M', 'accCreationDate' => '2018-12-15 16:39:36', 'salary' => 2030, 'airport_id' => 5, 'role' => 2],
            ['fName' => 'Valenka', 'surname' => 'Cammidge', 'birthdate' => '1989/06/03', 'phone' => '910252228', 'nif' => '171828132', 'gender' => 'F', 'accCreationDate' => '2019-04-28 15:53:44', 'salary' => 2135, 'airport_id' => 12, 'role' => 3],

        ];
        foreach ($arr as $pessoa) {
            $user = new User();
            $userData = new UserData();
            $employee = new Employee();

            // tabela USER
            $user->username = strtolower($pessoa['fName']);
            $user->email = strtolower($pessoa['fName']) . "@gmail.com";
            $user->setPassword(strtolower($pessoa['fName']) . "123");
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->status = 10;

            $user->save();


            // tabela USERDATA
            $userData->user_id = $user->getId();
            $userData->fName = $pessoa['fName'];
            $userData->surname = $pessoa['surname'];
            $userData->birthdate = date('Y/m/d', strtotime($pessoa['birthdate']));
            $userData->phone = $pessoa['phone'];
            $userData->nif = $pessoa['nif'];
            $userData->gender = $pessoa['gender'];
            $userData->accCreationDate = $pessoa['accCreationDate'];

            $userData->save();


            // tabela EMPLOYEE
            $employee->user_id = $user->getId();
            $employee->salary = $pessoa['salary'];
            $employee->airport_id = $pessoa['airport_id'];
            switch ($pessoa['role']) {
                case 1:
                    $auth = \Yii::$app->authManager;
                    $role = $auth->getRole("admin");
                    $auth->assign($role, $user->getId());
                case 2:
                    $auth = \Yii::$app->authManager;
                    $role = $auth->getRole("supervisor");
                    $auth->assign($role, $user->getId());
                default:
                    $auth = \Yii::$app->authManager;
                    $role = $auth->getRole("ticketOperator");
                    $auth->assign($role, $user->getId());
            }

            $employee->save();
        }
    }

    public function actionGenerateAirport()
    {
        $arr = [
            ['country' => 'Russia', 'code' => 'RU', 'city' => 'Novyy Karachay', 'search' => '84', 'status' => true],
            ['country' => 'France', 'code' => 'FR', 'city' => 'Créteil', 'search' => '25', 'status' => true],
            ['country' => 'Montenegro', 'code' => 'ME', 'city' => 'Ulcinj', 'search' => '7', 'status' => false],
            ['country' => 'Albania', 'code' => 'AL', 'city' => 'Qelëz', 'search' => '95', 'status' => true],
            ['country' => 'Nigeria', 'code' => 'NG', 'city' => 'Suya', 'search' => '41', 'status' => false],
            ['country' => 'Brazil', 'code' => 'BR', 'city' => 'Unaí', 'search' => '75', 'status' => true],
            ['country' => 'Indonesia', 'code' => 'ID', 'city' => 'Komi', 'search' => '43', 'status' => true],
            ['country' => 'United States', 'code' => 'US', 'city' => 'Tampa', 'search' => '38', 'status' => true],
            ['country' => 'China', 'code' => 'CN', 'city' => 'Kuishan', 'search' => '17', 'status' => true],
            ['country' => 'Indonesia', 'code' => 'ID', 'city' => 'Malati', 'search' => '39', 'status' => true],
            ['country' => 'Sweden', 'code' => 'SE', 'city' => 'Ytterby', 'search' => '36', 'status' => true],
            ['country' => 'Macedonia', 'code' => 'MK', 'city' => 'Oslomej', 'search' => '11', 'status' => true],
            ['country' => 'Indonesia', 'code' => 'ID', 'city' => 'Tambulatana', 'search' => '71', 'status' => false],
            ['country' => 'Philippines', 'code' => 'PH', 'city' => 'Concepcion', 'search' => '12', 'status' => true],
            ['country' => 'Russia', 'code' => 'RU', 'city' => 'Sukhobezvodnoye', 'search' => '41', 'status' => true],
            ['country' => 'Slovenia', 'code' => 'SI', 'city' => 'Mengeš', 'search' => '52', 'status' => true],
            ['country' => 'Russia', 'code' => 'RU', 'city' => 'Voznesenskaya', 'search' => '71', 'status' => true],
            ['country' => 'Philippines', 'code' => 'PH', 'city' => 'Don Carlos', 'search' => '3', 'status' => false],
            ['country' => 'Portugal', 'code' => 'PT', 'city' => 'Porto', 'search' => '50', 'status' => true],
            ['country' => 'Gambia', 'code' => 'GM', 'city' => 'Bambali', 'search' => '74', 'status' => true],
            ['country' => 'Russia', 'code' => 'RU', 'city' => 'Serdobsk', 'search' => '37', 'status' => false],
            ['country' => 'China', 'code' => 'CN', 'city' => 'Yongning', 'search' => '55', 'status' => true],
            ['country' => 'Myanmar', 'code' => 'MM', 'city' => 'Mogok', 'search' => '14', 'status' => false],
            ['country' => 'Colombia', 'code' => 'CO', 'city' => 'El Tambo', 'search' => '6', 'status' => true],
            ['country' => 'Cyprus', 'code' => 'CY', 'city' => 'Kato Pyrgos', 'search' => '91', 'status' => false],
            ['country' => 'Syria', 'code' => 'SY', 'city' => 'Armanaz', 'search' => '50', 'status' => false],
        ];
        foreach ($arr as $aeroporto) {
            $airport = new Airport();

            // tabela AIRPORT
            $airport->country = $aeroporto['country'];
            $airport->code = $aeroporto['code'];
            $airport->city = $aeroporto['city'];
            $airport->search = $aeroporto['search'];
            if ($aeroporto['status'])
                $airport->status = "Operational";
            else
                $airport->status = "Not Operational";


            $airport->save();
        }
    }

    public function actionGenerateAirplane()
    {
        $arr = [
            ['luggageCapacity' => 413, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 9, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 173, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 154, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 9, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'F', 'luxuryStart' => 'G', 'status' => true],
            ['luggageCapacity' => 480, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 8, 'maxCol' => 'I', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 247, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 229, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 478, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 431, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 9, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'F', 'luxuryStart' => 'G', 'status' => true],
            ['luggageCapacity' => 416, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 222, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 317, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 108, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 320, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 278, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'J', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 390, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 330, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 9, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'E', 'luxuryStart' => 'F', 'status' => true],
            ['luggageCapacity' => 188, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 9, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 453, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'I', 'luxuryStart' => 'J', 'status' => true],
            ['luggageCapacity' => 345, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 302, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 443, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 128, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'D', 'normalStart' => 'E', 'normalStop' => 'D', 'luxuryStart' => 'E', 'status' => true],
            ['luggageCapacity' => 268, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'G', 'luxuryStart' => 'H', 'status' => true],
            ['luggageCapacity' => 314, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 7, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 425, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 8, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'F', 'luxuryStart' => 'G', 'status' => true],
            ['luggageCapacity' => 424, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 9, 'maxCol' => 'J', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'F', 'luxuryStart' => 'G', 'status' => true],
            ['luggageCapacity' => 396, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 8, 'maxCol' => 'K', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 349, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 350, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 6, 'maxCol' => 'L', 'economicStart' => 'A', 'economicStop' => 'C', 'normalStart' => 'D', 'normalStop' => 'H', 'luxuryStart' => 'I', 'status' => true],
            ['luggageCapacity' => 154, 'minLinha' => 1, 'minCol' => 'A', 'maxLinha' => 8, 'maxCol' => 'F', 'economicStart' => 'A', 'economicStop' => 'B', 'normalStart' => 'C', 'normalStop' => 'D', 'luxuryStart' => 'E', 'status' => true],

        ];
        foreach ($arr as $aviao) {
            $airplane = new Airplane();

            // tabela AIRPLANE
            $airplane->luggageCapacity = $aviao['luggageCapacity'];
            $airplane->minLinha = $aviao['minLinha'];
            $airplane->minCol = $aviao['minCol'];
            $airplane->maxLinha = $aviao['maxLinha'];
            $airplane->maxCol = $aviao['maxCol'];
            $airplane->economicStart = $aviao['economicStart'];
            $airplane->economicStop = $aviao['economicStop'];
            $airplane->normalStart = $aviao['normalStart'];
            $airplane->normalStop = $aviao['normalStop'];
            $airplane->luxuryStart = $aviao['luxuryStart'];
            $airplane->luxuryStop = $aviao['maxCol'];


            if ($aviao['status'])
                $airplane->status = "Active";
            else
                $airplane->status = "Not Working";


            $airplane->save();
        }
    }



    protected function findModel($user_id)
    {
        if (($model = Employee::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function filtrarRoles($temp)
    {
        $roles = [];

        // filtrar as roles
        foreach ($temp as $role) {
            if ($role->name != 'client') {
                $roles[$role->name] = $role->name;
            }
        }
        return $roles;
    }
}
