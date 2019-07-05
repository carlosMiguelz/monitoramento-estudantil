<?php
namespace App\Http\Controllers\Api;
use App\API\ApiError;
use App\Tipo_de_pergunta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class  Tipo_de_perguntaController extends Controller
{
	/**
	 * @var Tipo_pergunta
	 */
	private $tipo_pergunta;
	public function __construct(Tipo_de_pergunta  $tipo_pergunta)
	{
		$this->tipo_pergunta = $tipo_pergunta;
	}
	public function index()
    {
			sleep(2);
			
    	return response()->json($this->tipo_pergunta->get());
    }
    public function show($id)
    {
    	$tipo_pergunta = $this->tipo_pergunta->find($id);
    	if(! $tipo_pergunta) return response()->json(['data' => ['msg' => 'tipo_pergunta não encontrado!']], 404);
    	$data = ['data' => $tipo_pergunta];
	    return response()->json($data);
    }
    public function store(Request $request)
    {
		try {
			$tipo_perguntaData = $request->all();
			$this->tipo_pergunta->create($tipo_perguntaData);
			$return = ['data' => ['msg' => 'tipo_pergunta criado com sucesso!']];
			return response()->json($return, 201);
		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de salvar', 1010));
		}
    }
	public function update(Request $request, $id)
	{
		try {
			$tipo_perguntaData = $request->all();
			$tipo_pergunta     = $this->tipo_pergunta->find($id);
			$tipo_pergunta->update($tipo_perguntaData);
			$return = ['data' => ['msg' => 'tipo_pergunta atualizado com sucesso!']];
			return response()->json($return, 201);
		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011));
		}
	}
	public function delete(tipo_pergunta $id)
	{
		try {
			$id->delete();
			return response()->json(['data' => ['msg' => 'tipo_pergunta: ' . $id->name . ' removido com sucesso!']], 200);
		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012));
		}
	}

	public function drop()
	{
		try {
			$product = $this->tipo_pergunta->get();
        foreach($product as $item){
            $teste = $product->find($item['id']);
            $teste->delete();
        }
			return response()->json(['data' => ['msg' => 'Pergunta: ' . $id->name . ' removido com sucesso!']], 200);
		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012));
		}
	}
}