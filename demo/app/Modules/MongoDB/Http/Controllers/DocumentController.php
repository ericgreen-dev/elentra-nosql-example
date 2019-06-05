<?php

namespace App\Modules\MongoDB\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\MongoDB\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class DocumentController extends Controller {

    /**
     * Get a listing of documents
     *
     * @param Request $request
     *
     * @throws
     * @return Response
     */
  public function index(Request $request) {
    return response(Document::all());
  }

    /**
     * Get a single document
     *
     * @param Request  $request
     * @param Document $document
     *
     * @throws
     * @return Response
     */
  public function show(Request $request, Document $document) {
    return response($document);
  }

    /**
     * Save a document
     *
     * @param Request  $request
     * @param Document $document
     *
     * @throws
     * @return Response
     */
  public function store(Request $request, Document $document) {
    $document->fill($request->all());
    if (!$document->save()) {
      abort(500, __('Error creating document'));
    }
    return response($document, 201);
  }

    /**
     * Update a document
     *
     * @param Request  $request
     * @param Document $document
     *
     * @throws
     * @return Response
     */
  public function update(Request $request, Document $document) {
    $document->fill($request->all());
    if (!$document->save()) {
      abort(500, __('Error updating document'));
    }
    return response($document);
  }

    /**
     * Delete a document
     *
     * @param Request  $request
     * @param Document $document
     *
     * @throws
     * @return Response
     */
  public function destroy(Request $request, Document $document) {
    if (!$document->delete()) {
      abort(500, __('Error deleting document'));
    }
    return response($document);
  }

}
