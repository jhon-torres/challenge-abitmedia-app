## Acerca este proyecto

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
[Diagrama de Base de Datos](https://dbdiagram.io/d/Copy-of-DB-products-and-services-Abitmedia-65f1be42b1f3d4062cd6fc96)

## Descripción de APIs
### ➡️ Productos de Software
#### Obtener todos los productos de software
```http
  GET /api/software
```
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
#### Crear un servicio
```http
  POST /api/service
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `description` | `string` | **Requerido**. Nombre del servicio |
| `price` | `numeric` | **Requerido**. Precio del servicio |
| `sku` | `string` | **Requerido**. Identificador SKU del servicio |

#### Actualizar un producto de software
```http
  PUT /api/service/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del servicio a buscar |
| `description` | `string` | **Requerido**. Nombre del servicio |
| `price` | `numeric` | **Requerido**. Precio del servicio |
| `sku` | `string` | **Requerido**. Identificador SKU del servicio |

#### Eliminar un producto de software
```http
  DELETE /api/service/${id}
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `numeric` | **Requerido**. ID del servicio a eliminar |
