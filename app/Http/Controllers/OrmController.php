<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Forum;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\shelter;
use App\Models\Shipment;
use App\Models\ShoppingCart;
use App\Models\Sock;
use App\Models\Trainer;
use App\Models\Type;
use App\Models\User;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class OrmController extends Controller
{
    public function consultas()
    {
        // Obtener un usuario específico por ID
        //$user = User::find(1);
        //return $user;

        // Obtener todos los usuarios
        //$users = User::all();
        //return $users;

        // Usuario -> Foros
        //$user = User::find(1);
        //return $user->forums;

        // Usuario -> Mascotas
        //$user = User::find(1);
        //return $user->pets;

        // Usuario -> Carritos de compra
        //$user = User::find(1);
        //return $user->shoppingcarts;

        // Usuario -> Órdenes
        //$user = User::find(1);
        //return $user->orders;

        // Usuario -> Solicitudes
        //$user = User::find(1);
        //return $user->request;

        // Usuario -> Entrenador
        //$user = User::find(1);
        //return $user->trainer;

        // Usuario -> Veterinario
        //$user = User::find(1);
        //return $user->veterinarian;
        // Obtener una mascota por ID
        //$pet = Pet::find(1);
        //return $pet;

        // Obtener todas las mascotas
        //$pets = Pet::all();
        //return $pets;
        // Mascota -> Entrenador
        //$pet = Pet::find(1);
        //return $pet->trainer;

        // Mascota -> Cita
        //$pet = Pet::find(1);
        //return $pet->appointment;

        // Mascota -> Refugio
        //$pet = Pet::find(1);
        //return $pet->shelter;

        // Mascota -> Usuario (dueño)
        //$pet = Pet::find(1);
        //return $pet->user;
        // Obtener un producto por ID
        // $product = Product::find(1); 
        // return $product; 

        // Obtener todos los productos
        // $products = Product::all(); 
        // return $products; 
        // Producto -> Categoría
        // $product = Product::find(1); 
        // return $product->category; 

        // Producto -> Inventario
        // $product = Product::find(1); 
        // return $product->inventory; 

        // Producto -> Items de orden
        // $product = Product::find(1); 
        // return $product->orderItems; 

        // Producto -> Carritos de compra
        // $product = Product::find(1); 
        // return $product->shoppingCart; 
        // Obtener una orden por ID
        // $order = Order::find(1); 
        // return $order; 

        // Obtener todas las órdenes
        // $orders = Order::all(); 
        // return $orders; 
        // Orden -> Usuario
        // $order = Order::find(1); 
        // return $order->user; 

        // Orden -> Items de orden
        // $order = Order::find(1); 
        // return $order->orderItems; 

        // Orden -> Envío
        // $order = Order::find(1); 
        // return $order->shipment; 
        // Obtener un servicio por ID
        // $service = Service::find(1); 
        // return $service; 

        // Obtener todos los servicios
        // $services = Service::all(); 
        // return $services; 
        // Obtener un refugio por ID
        // $shelter = Shelter::find(1); 
        // return $shelter; 

        // Obtener todos los refugios
        // $shelters = Shelter::all(); 
        // return $shelters; 
        // Refugio -> Adopciones
        // $shelter = Shelter::find(1); 
        // return $shelter->adoptions; 

        // Refugio -> Mascotas
        // $shelter = Shelter::find(1); 
        // return $shelter->pets; 
        // Obtener una adopción por ID
        // $adoption = Adoption::find(1); 
        // return $adoption; 

        // Obtener todas las adopciones
        // $adoptions = Adoption::all(); 
        // return $adoptions; 
        // Adopción -> Usuario
        // $adoption = Adoption::find(1); 
        // return $adoption->user; 

        // Adopción -> Mascota
        // $adoption = Adoption::find(1); 
        // return $adoption->pet; 

        // Adopción -> Solicitud
        // $adoption = Adoption::find(1); 
        // return $adoption->request; 

        // Adopción -> Refugio
        // $adoption = Adoption::find(1); 
        // return $adoption->shelter; 
        // Obtener una cita por ID
        // $appointment = Appointment::find(1); 
        // return $appointment; 

        // Obtener todas las citas
        // $appointments = Appointment::all(); 
        // return $appointments; 

        // Filtrar citas por estado
        // $appointments = Appointment::where('state', 'scheduled')->get(); 
        // return $appointments; 

        // Obtener citas por razón
        // $appointments = Appointment::where('reason', 'like', '%vacuna%')->get(); 
        // return $appointments; 
        // Cita -> Usuario
        // $appointment = Appointment::find(1); 
        // return $appointment->user; 

        // Cita -> Veterinario
        // $appointment = Appointment::find(1); 
        // return $appointment->veterinarian; 

        // Cita -> Mascotas
        // $appointment = Appointment::find(1); 
        // return $appointment->pet; 

        // Cita -> Solicitud
        // $appointment = Appointment::find(1); 
        // return $appointment->request; 
        // Obtener un foro por ID
        // $forum = Forum::find(1); 
        // return $forum; 

        // Obtener todos los foros
        // $forums = Forum::all(); 
        // return $forums; 

        // Foro -> Usuario
        // $forum = Forum::find(1); 
        // return $forum->user; 

        // Foro -> Temas
        // $forum = Forum::find(1); 
        // return $forum->topics; 
        // Obtener una categoría por ID
        // $category = Category::find(1); 
        // return $category; 

        // Obtener todas las categorías
        // $categories = Category::all(); 
        // return $categories; 
        // Categoría -> Productos
        // $category = Category::find(1); 
        // return $category->products; 
        // Obtener un inventario por ID
        // $inventory = Inventory::find(1); 
        // return $inventory; 

        // Obtener todos los inventarios
        // $inventories = Inventory::all(); 
        // return $inventories; 
        // Inventario -> Producto
        // $inventory = Inventory::find(1); 
        // return $inventory->product; 
        // Obtener una solicitud por ID
        // $request = Request::find(1); 
        // return $request; 

        // Obtener todas las solicitudes
        // $requests = Request::all(); 
        // return $requests; 
        // Solicitud -> Usuario
        // $request = Request::find(1); 
        // return $request->user; 

        // Solicitud -> Refugio
        // $request = Request::find(1); 
        // return $request->shelter; 

        // Solicitud -> Cita
        // $request = Request::find(1); 
        // return $request->appointment; 

        // Solicitud -> Servicios
        // $request = Request::find(1); 
        // return $request->services; 

        // Solicitud -> Tipo
        // $request = Request::find(1); 
        // return $request->type; 
        // Obtener un horario por ID
        // $schedule = Schedule::find(1); 
        // return $schedule; 

        // Obtener todos los horarios
        // $schedules = Schedule::all(); 
        // return $schedules; 
        // Horario -> Servicio
        // $schedule = Schedule::find(1); 
        // return $schedule->service; 
        // Obtener un entrenador por ID
        // $trainer = Trainer::find(1); 
        // return $trainer; 

        // Obtener todos los entrenadores
        // $trainers = Trainer::all(); 
        // return $trainers; 
        // Entrenador -> Mascotas
        // $trainer = Trainer::find(1); 
        // return $trainer->pets; 

        // Entrenador -> Servicios
        // $trainer = Trainer::find(1); 
        // return $trainer->services; 

        // Entrenador -> Usuarios
        // $trainer = Trainer::find(1); 
        // return $trainer->users; 
        // Obtener un tipo por ID
        // $type = Type::find(1); 
        // return $type; 

        // Obtener todos los tipos
        // $types = Type::all(); 
        // return $types; 
        // Tipo -> Solicitudes
        // $type = Type::find(1); 
        // return $type->request; 
        // Obtener un veterinario por ID
        // $veterinarian = Veterinarian::find(1); 
        // return $veterinarian; 

        // Obtener todos los veterinarios
        // $veterinarians = Veterinarian::all(); 
        // return $veterinarians; 
        // Veterinario -> Servicios
        // $veterinarian = Veterinarian::find(1); 
        // return $veterinarian->services; 

        // Veterinario -> Citas
        // $veterinarian = Veterinarian::find(1); 
        // return $veterinarian->appointment; 

        // Veterinario -> Usuario
        // $veterinarian = Veterinarian::find(1); 
        // return $veterinarian->user; 
        // Obtener un envío por ID
        // $shipment = Shipment::find(1); 
        // return $shipment; 

        // Obtener todos los envíos
        // $shipments = Shipment::all(); 
        // return $shipments; 
        // Envío -> Orden
        // $shipment = Shipment::find(1); 
        // return $shipment->order; 
        // Obtener un carrito por ID
        // $cart = ShoppingCart::find(1); 
        // return $cart; 

        // Obtener todos los carritos
        // $carts = ShoppingCart::all(); 
        // return $carts; 
        // Carrito -> Usuario
        // $cart = ShoppingCart::find(1); 
        // return $cart->user; 

        // Carrito -> Producto
        // $cart = ShoppingCart::find(1); 
        // return $cart->product; 

        // Carrito -> Orden
        // $cart = ShoppingCart::find(1); 
        // return $cart->order; 
        // Obtener un calcetín por ID
        // $sock = Sock::find(1); 
        // return $sock; 

        // Obtener todos los calcetines
        // $socks = Sock::all(); 
        // return $socks; 
        // Obtener un método de pago por ID
        // $paymentMethod = PaymentMethod::find(1); 
        // return $paymentMethod; 

        // Obtener todos los métodos de pago
        // $paymentMethods = PaymentMethod::all(); 
        // return $paymentMethods; 

        // Método de pago -> Usuario
        $paymentMethod = PaymentMethod::find(1);
        return $paymentMethod->user;
    }
}
