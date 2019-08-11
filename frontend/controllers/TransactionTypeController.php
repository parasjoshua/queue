<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TransactionType;
use frontend\models\Department;
use frontend\models\TransactionTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Status;
use yii\helpers\ArrayHelper;

/**
 * TransactionTypeController implements the CRUD actions for TransactionType model.
 */
class TransactionTypeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TransactionType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransactionTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransactionType model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TransactionType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransactionType();
        $status = ArrayHelper::map(Status::find()->all(),'id','description');
        $deptlist = ArrayHelper::map(Department::find()->all(),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $model->date_added = date("Y-m-d");
            $model->added_by = Yii::$app->user->identity->id;
            $model->save();
            // print_r($model->getErrors());
            // exit;
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
            'status' => $status,
            'deptlist' => $deptlist,
            
        ]);
    }

    /**
     * Updates an existing TransactionType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $status = ArrayHelper::map(Status::find()->all(),'id','description');
        $deptlist = ArrayHelper::map(Department::find()->all(),'id','name');
        

        if ($model->load(Yii::$app->request->post())) {
            $model->date_added = date("Y-m-d");
            $model->added_by = Yii::$app->user->identity->id;
            $model->save();
            // print_r($model->getErrors());
            // exit;
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
            'status' => $status,
            'deptlist' => $deptlist,
            
        ]);
    }

    /**
     * Deletes an existing TransactionType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransactionType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TransactionType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransactionType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
