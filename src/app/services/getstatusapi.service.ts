import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';

@Injectable()
export class getStatusApi 
{
	constructor(private _httpclient: HttpClient) {

	}

	getTrackingStatus(params): Observable<any> {

		return this._httpclient.get(environment.apiBaseUrl+"sampson-php/Trackandtrace.php",{params});
	}

	downloadPdf(params): Observable<any> {

		let headers = new HttpHeaders();
		//headers = headers.set('Accept', 'application/json');

		return this._httpclient.get(environment.apiBaseUrl+"sampson-php/downloadpdf.php",{params,responseType: 'json',headers});
	}
	
}

