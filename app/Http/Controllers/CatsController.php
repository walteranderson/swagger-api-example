<?php

namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    /**
     * GET
     * Fetch all cats
     *
     * optional params:
     * - status: filter on cat status
     * - last_fed: filter cats that have not been fed since the date given
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = DB::table('cats');

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('last_fed')) {
            $query->where('last_fed', '<=', $request->input('last_fed'));
        }

        $cats = $query->get();

        return response()->json($cats);
    }

    /**
     * GET
     * Fetch a cat by it's ID.
     *
     * @param  int $id - the requested cat ID
     * @return Response
     */
    public function show($id)
    {
        $cat = Cat::find($id);
        if (! $cat) {
            return $this->notFound();
        }

        return response()->json($cat);
    }

    /**
     * PUT
     * Update existing cat
     *
     * @param  Request $request
     * @param  int     $id - the requested cat ID
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $cat = Cat::find($id);
        if (! $cat) {
            return $this->notFound();
        }

        $updated = $request->all();
        if (! $updated) {
            return $this->badRequest();
        }

        $cat->fill($updated);
        $cat->save();

        return response()->json($cat);
    }

    /**
     * POST
     * Create a new cat
     *
     * @param  Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        if (! $data) {
            return $this->badRequest();
        }

        $cat = Cat::create($data);

        return response()->json($cat);
    }

    /**
     * DELETE
     * Delete a cat record
     *
     * @param  Request $request
     * @param  int     $id - the requested cat ID
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $cat = Cat::find($id);
        if (! $cat) {
            return $this->notFound();
        }

        $cat->delete();

        return response(null, 200);
    }
}
