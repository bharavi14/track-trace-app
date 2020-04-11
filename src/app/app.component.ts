import { Component } from '@angular/core';
import { getStatusApi } from './services/getstatusapi.service';
import { Statuses } from './classes/statuses';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {

  title = 'Track your Consignment Status Here';

  constructor(private _getStatusApi: getStatusApi)  
  { 
  	
  }

  lststatuses:Statuses[];
  cno:string;
  pdfFilename:string;
  downloadedfilename:string = '';

  getStatus(val: string) {

  const params = {param:val};
  	this.cno = val;
    this._getStatusApi.getTrackingStatus(params)
    .subscribe
    (
      data=>
      {
        this.lststatuses = data;
        this.downloadedfilename = '';
      }
    );
  }

  downloadPdf() { 
    //console.log(this.cno)
    const params = {cno:this.cno};
    this._getStatusApi.downloadPdf(params)
    .subscribe
    (
      data =>
      {
        this.downloadedfilename = data.filename;
        console.log(data);
      }  
      
    )
  }
}
