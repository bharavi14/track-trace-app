import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient,HttpHeaders } from '@angular/common/http';

@Injectable()
export class getStatusApi 
{
	constructor(private _httpclient: HttpClient) {

	}

	getTrackingStatus(params): Observable<any> {

		return this._httpclient.get("http://localhost/sampson-php/Trackandtrace.php",{params});
	}

	downloadPdf(params): Observable<any> {

		let headers = new HttpHeaders();
		headers = headers.set('Accept', 'application/pdf');

		return this._httpclient.get('http://localhost/sampson-php/downloadpdf.php',{params,responseType: 'blob',headers});
	}
	
}

