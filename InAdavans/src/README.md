CONFIGURATION
-------------

### Appliquer les migrations

```
$ yii migrate/up --migrationPath=@app/modules/audit_trail/migrations
```

### Configurer le module en lui indiquant la classe et le nom de l'événement

Obligatoires :

- class : la classe du module

Facultatifs :

- defaultEvents :
Tableau décrivant une liste d'abonnements à installer dans votre gestionnaire.
Chaque poste du tableau doit renseigner :
        'class' : classe contenant le nom de l'événement
        'name' : nom de l'événement
        'method' : (facultatif) nom de la méthode statique qui sera appelée dans le modèle Monitoring pour traiter l'événement. Par défaut,
            c'est la méthode Monitoring::addMonitoring qui est utilisée

- eventHandlerClass :
Nom de la classe qui fait office de gestionnaire d'événements pour ce module. Il est d'usage de faire hériter une classe personnalisée
pour adapter EventHandler à votre application, notamment pour l'abonner à des événements spécifiques

```
        'audit_trail' => [
            'class' => 'app\modules\audit_trail\Module',
            'eventHandlerClass' => 'app\lib\AuditTrailEventHandler',
            'defaultEvents' => [
                ['class' => 'app\controllers\TrainingProgramController', 'name' => 'monitored action'],
                ...
            ]
        ],
```

### Charger le module au lancement de l'application

ce qui se fait normalement en l'ajoutant au bootstrap de l'application :

```
    'bootstrap' => ['log', 'ia', [...], 'monitoring'],
```

