<?php
/*Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/-*/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['adiciona', 'eliminar']]);
    }

    public function listar()
    {
        $productos = Producto::all();
        return view('producto.listado')->with('productos', $productos);
    }

    public function mostra($id)
    {
        $producto = Producto::find($id);

        if (empty($producto)) {
            return "El producto no existe";
        }

        return view('producto.detalles')->with('p', $producto);
    }

    public function eliminar($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->action('ProductoController@listar');
    }

    public function nuevo()
    {
        return view('producto.formulario')->with('categorias', Categoria::all());
    }

    public function adiciona()
    {
        $validator = Validator::make(
            [
                'nombre' => Request::input('nombre'),
                'precio' => Request::input('precio'),
                'descripcion' => Request::input('descripcion'),
                'cantidad' => Request::input('cantidad')
                ],
            [
                'nombre' => 'required|min:5',
                'precio' => 'required|numeric',
                'descripcion' => 'nullable|max:255',
                'cantidad' => 'required|numeric'
                ]
        );

        if ($validator->fails()) {
            return redirect()->action('ProductoController@nuevo')->withErrors($validator)->withInput(Request::flash());
        }

        Producto::create(Request::all());
        return redirect()->action('ProductoController@listar')->withInput(Request::only('nombre'));
    }
}
