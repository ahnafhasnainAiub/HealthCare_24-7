import {useRef} from 'react'
import emailjs from '@emailjs/browser';

const Contact =() =>{
    const form = useRef()

    const sendEmail = (e) => {
        e.preventDefault();
    
        emailjs.sendForm('service_nie1ake', 'template_7r0nvug', form.current, 'YzLfMuI368D7MMuGu')
          .then((result) => {
              console.log(result.text);
          }, (error) => {
              console.log(error.text);
          });
          e.target.reset()
      };
    return(
        <div>
        <div className="row">
            <div className="col-sm-6">
                <div className="card p-4">
        <div>
            {console.log('test')}
        <section>
            <form>
            <div className='container'>
                <h2 className="--text-center">Contact Us</h2>
                <form ref={form} onSubmit = {sendEmail} className="--text-centrol--card--flex-center --dir-column">
                <input type="text" placeholder='Full Name' name='user_name' required />
            
                <input type="email" placeholder='Email' name='user_email' required />
                <input type="text" placeholder='Subject' name='subject' required />
                <textarea name="message" cols="30" rows="10"></textarea>
                <button type='submit' className="--btn--btn-primary">Send Mail</button>


                </form> 
            
            </div>
            </form>
        </section>
        </div>
        
        </div>
        </div>
        </div>
        </div>
    )
}
export default Contact;