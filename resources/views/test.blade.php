<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div>
        <button onClick="showAlert()">show</button>
    </div>
    <script>

        import React from 'react'
            import swal from '@sweetalert/with-react'
            
            const onPick = value => {
                swal("Thanks for your rating!", `You rated us ${value}/3`, "success")
                }
                
            const MoodButton = ({ rating, onClick }) => (
                <button 
                    data-rating={rating}
                    className="mood-btn" 
                    onClick={() => onClick(rating)}
                />
            )
            
            

            const showAlert = ()=> {
                swal({
                text: "How was your experience getting help with this issue?",
                buttons: {
                    cancel: "Close",
                },
                content: (
                    <div>
                    <MoodButton 
                        rating={1} 
                        onClick={onPick}
                    />
                    <MoodButton 
                        rating={2} 
                        onClick={onPick}
                    />
                    <MoodButton 
                        rating={3} 
                        onClick={onPick}
                    />
                    </div>
                )
            });
            }

            const RedashAlert = () => {
                return {
                    

                }
            }
            export default RedashAlert
    </script>
</body>
</html>