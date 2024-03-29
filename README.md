<p align="center"><a style="backgroud:black" href="https://abitmedia.cloud/" target="_blank"><img src="https://abitmedia.cloud/wp-content/uploads/2023/03/1-Logo-Abitmedia-SVG.svg" width="400" alt="Abitmedia Logo"></a></p>

## Acerca de este proyecto

<details>
<summary>Información relevante</summary>
Una empresa de venta de software y servicios de soporte, requiere implementar un sistema para 
poder gestionar su oferta de productos, los mismos detallados a continuación:
    
### Software:
- Antivirus ($5 para Windows, $7 para Mac), en existencia 10 para cada S.O.
respectivamente.
- Ofimática ($10 para Windows, $12 para Mac), en existencia 20 para cada S.O.
respectivamente.
- Editor de video ($20 para Windows, $22 para Mac), en existencia 30 para cada S.O. 
respectivamente.

### Servicios:
- Formateo de computadores ($25)
- Mantenimiento ($30)
- Hora de soporte en software ($50)
### Requerimientos funcionales 
1. El usuario del sistema podría generar operaciones CRUD, tanto para software como 
servicios.
2. Al agregar una licencia de software, debería generarse automáticamente un serial de 100 
caracteres asignado a la misma, este serial no puede repetirse.
3. Tanto software como servicios deben tener un identificador SKU irrepetible de 10 
caracteres, ingresado manualmente.
4. La API debe ser segura.
</details>

<details>
<summary>Visita el Despliegue del proyecto</summary>
    
[Documentación en PostMan](https://app.getpostman.com/join-team?invite_code=1eaf4e4a47f0aec6f7830e24b5722978&target_code=41ed96a356da168c158657e112c0a1ee)
    
[Despliegue del proyecto Laravel](https://challenge-abitmedia-app-production.up.railway.app)
</details>

<details>
<summary>Instalación Local</summary>

Clonar o descargar [ZIP](https://github.com/jhon-torres/challenge-abitmedia-app/archive/refs/heads/master.zip)

```bash
  composer install 
  cp .env.example .env 
  php artisan key:generate
```
Posterior configurar las variables de entorno.

A continuación, configurar la Base de Datos con nombre especificado en las variables en MyAdmin`
```bash
  php artisan migrate 
  npm install   
```
Ejecutar el proyecto
```bash
  php artisan serve
```
</details>

## Diseño de BDD
[Diagrama de Base de Datos](https://dbdiagram.io/d/Copy-of-Copy-of-DB-products-and-services-Abitmedia-65f4ba51ae072629ce239d5a)

## Descripción de APIs
### ➡️ Autenticación de usuario
#### Inicio de sesión
```http
  POST /api/login
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Requerido**. Email del usuario |
| `password` | `string` | **Requerido**. Contraseña del usuario |

JSON request
```bash
{
  "email" : "user@user.com",
  "password" : "password"
}
```

#### Cierre de sesión
```http
  POST /api/logout
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `token` | `Bearer` | **Requerido**. Token generado por el inicio de sesión |


### ➡️ Productos de Software
#### Obtener todos los productos de software
```http
  GET /api/software
```
#### Obtener un producto de software específico
```http
  GET /api/software/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del producto de software específico a buscar |
#### Crear un producto de software
```http
  POST /api/software
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `description` | `string` | **Requerido**. Nombre del producto de software |
| `price` | `numeric` | **Requerido**. Precio del producto de software |
| `os` | `string` | **Requerido**. Nombre del Sistema operativo |
| `stock` | `numeric` | **Requerido**. Existencias del producto de software |
| `sku` | `string` | **Requerido**. Identificador SKU del producto de software |

JSON request
```bash
{
  "description" : "Ofimática",
  "price": 10,
  "os": "Windows",
  "stock": 20,
  "sku":"ofimaticaW"
}
```

#### Actualizar un producto de software
```http
  PUT /api/software/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del producto de software a buscar |
| `description` | `string` | **Requerido**. Nombre del producto de software |
| `price` | `numeric` | **Requerido**. Precio del producto de software |
| `os` | `string` | **Requerido**. Nombre del Sistema operativo |
| `stock` | `numeric` | **Requerido**. Existencias del producto de software |
| `sku` | `string` | **Requerido**. Identificador SKU del producto de software |

JSON request
```bash
{
  "description" : "Ofimática",
  "price": 10,
  "os": "Windows",
  "stock": 20,
  "sku":"ofimaticaW"
}
```

#### Eliminar un producto de software
```http
  DELETE /api/software/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del producto de software a eliminar |


### ➡️ Servicios
#### Obtener todos los servicios
```http
  GET /api/service
```
#### Obtener un servicio en específico
```http
  GET /api/service/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del servicio a buscar |
#### Crear un servicio
```http
  POST /api/service
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `description` | `string` | **Requerido**. Nombre del servicio |
| `price` | `numeric` | **Requerido**. Precio del servicio |
| `sku` | `string` | **Requerido**. Identificador SKU del servicio |

JSON request
```bash
{
  "description" : "Formateo de computadoras",
  "price": 25,
  "sku":"formateoDC"
}
```

#### Actualizar un servicio
```http
  PUT /api/service/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del servicio a buscar |
| `description` | `string` | **Requerido**. Nombre del servicio |
| `price` | `numeric` | **Requerido**. Precio del servicio |
| `sku` | `string` | **Requerido**. Identificador SKU del servicio |

JSON request
```bash
{
  "description" : "Formateo de computadoras",
  "price": 25,
  "sku":"formateoDC"
}
```

#### Eliminar un servicio
```http
  DELETE /api/service/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del servicio a eliminar |
