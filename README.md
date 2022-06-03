# Symfony Messenger - DEMO
Aplicación a modo de demo para demostrar el funcionamiento de Symfony Messenger.

## Cómo utilizarlo
- Levantamos uno o más workers para que consuman los mensajes de la cola, de levantar más de uno tendremos que indicar un nombre de worker distinto.
- Levantar el servicio para consumir los mensajes que hayan fallado y esten en la dead letter.
- Por último, creamos y lanzamos los mensajes contra el bus.

### Cómo levantar un worker
```
MESSENGER_CONSUMER_NAME=worker-1 php bin/console messenger:consume async
```
**async**: Nombre del transport configurado en `messenger.yaml`

### Cómo consumir mensajes de la dead letter
```
php bin/console messenger:consume failed
```

### Cómo crear y lanzar mensajes contra el bus
```
php bin/console app:demo:messages 50
```

## Recursos
- [Symfony Messenger](https://symfony.com/doc/current/messenger.html)
- [Symfony Messenger - Gerardo Fernández](https://latteandcode.medium.com/symfony-introducci%C3%B3n-al-componente-messenger-i-e2a4df1adc40)
