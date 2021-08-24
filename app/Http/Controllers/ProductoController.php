<?php
/*Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/-*/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as verificador;
use App\Models\Producto;
use App\Models\Categoria;
use Session;
use Redirect;

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

/* ---------------Para el ejemplo CRUD 2--------------- */

    public function index()
    {
      /*
        *Para agregar paginación podemos usar paginate(n) para limitiar los registros mostrados por página,
        con links() en blade podemos obtener la paginación
        *Existen otros métodos como orderBy
      */
        $articulos = Producto::orderBy('id','DESC')->paginate(5);
        return view('articulos.listar', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \App\Models\Categoria::get();
        return view('articulos.crear',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Verificador $request)
    {
      //Validar que los campos no estén vaciós
        $request->validate([
          'nombre'=>'required',
          'descripcion'=>'required',
          'cantidad'=>'required',
          'precio'=>'required'
        ]);
        //Almacenar los datos en la BD
        Producto::create($request->all());
        //Mostrar mensaje
        Session::flash('message','Se ha registrado el artículo correctamente');
        //Redireccionar al listado de artículos
        return redirect::to('articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */

     /*
        Tuve que cambiar el modelo por una variable id ya que pasando el modelo como
        parámetro no devolvía nada
     */
    public function edit($id)
    {
        $articulos = Producto::find($id);
        $categorias = Categoria::get();
        return view('articulos.editar',compact('articulos','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */

    public function update(Verificador $request, $id)
    {
      $request->validate([
        'nombre'=>'required',
        'categoria_id'=>'required',
        'descripcion'=>'required',
        'cantidad'=>'required',
        'precio'=>'required'
      ]);
      //Almacenar los datos en la BD
      $articulo = Producto::find($id);
      $articulo->update($request->all());
      //Mostrar mensaje
      Session::flash('message','Se ha actualizado el artículo correctamente');
      //Redireccionar al listado de artículos
      return redirect::to('articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo=Producto::find($id);
        $articulo->delete();
        Session::flash('message','Se ha eliminado el artículo correctamente');
        return redirect::to('articulos');
    }
}
